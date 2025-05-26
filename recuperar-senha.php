<?php
require __DIR__ . '/config/config.php';
session_start();
$titulo = "Recuperar Senha";

// Redireciona se já estiver logado
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Processa o formulário
$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    try {
        $stmt = $pdo->prepare("SELECT id, nome FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();
        
        if ($usuario) {
            // Gera token único
            $token = bin2hex(random_bytes(32));
            $expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Salva token no banco
            $stmt = $pdo->prepare("UPDATE usuarios SET reset_token = ?, reset_expira = ? WHERE id = ?");
            $stmt->execute([$token, $expiracao, $usuario['id']]);
            
            // Prepara link de recuperação
            $link = "http://" . $_SERVER['HTTP_HOST'] . "/resetar-senha.php?token=$token";
            
            // Envia email
            require 'includes/email.php';
            $assunto = "Recuperação de Senha - CLTreino";
            $mensagem = "
                <h1>Redefinição de Senha</h1>
                <p>Olá, {$usuario['nome']}!</p>
                <p>Recebemos uma solicitação para redefinir sua senha. Clique no link abaixo para continuar:</p>
                <p><a href='{$link}'>{$link}</a></p>
                <p><strong>O link expirará em 1 hora.</strong></p>
                <p>Se você não solicitou isso, por favor ignore este email.</p>
            ";
            
            if (enviarEmail($email, $assunto, $mensagem)) {
                $_SESSION['mensagem'] = "Um link de recuperação foi enviado para seu email.";
                header("Location: login.php");
                exit;
            } else {
                $erro = "Erro ao enviar email. Por favor, tente novamente mais tarde.";
            }
        } else {
            $erro = "Email não encontrado em nosso sistema.";
        }
    } catch (PDOException $e) {
        error_log("Erro na recuperação de senha: " . $e->getMessage());
        $erro = "Erro no sistema. Por favor, tente mais tarde.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .recovery-container {
            max-width: 500px;
            margin: 5rem auto;
        }
        .recovery-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">
    <div class="recovery-container">
        <div class="card recovery-card">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <img src="assets/images/logo-cltreino.png" alt="CLTreino Logo" width="80">
                    <h2 class="mt-3">Recuperar Senha</h2>
                    <p class="text-muted">Informe seu email para receber o link de recuperação</p>
                </div>

                <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                <?php endif; ?>

                <form method="POST" class="mt-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email cadastrado</label>
                        <input type="email" class="form-control" id="email" name="email" required
                               placeholder="seu@email.com">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="fas fa-paper-plane me-2"></i> Enviar Link
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="login.php" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i> Voltar para Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>