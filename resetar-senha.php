<?php
require __DIR__ . '/config/config.php';
session_start();
$titulo = "Redefinir Senha";

// Verifica se já está logado
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit;
}

$token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
$erro = '';

// Verifica token na primeira carga
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $token) {
    try {
        $stmt = $pdo->prepare("SELECT id, nome FROM usuarios WHERE reset_token = ? AND reset_expira > NOW()");
        $stmt->execute([$token]);
        $usuario = $stmt->fetch();
        
        if (!$usuario) {
            $_SESSION['erro'] = "Link inválido ou expirado. Solicite um novo link de recuperação.";
            header("Location: recuperar-senha.php");
            exit;
        }
    } catch (PDOException $e) {
        error_log("Erro ao verificar token: " . $e->getMessage());
        die("Erro ao processar sua solicitação. Por favor, tente novamente.");
    }
}

// Processa o formulário de nova senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    
    // Validações
    if (empty($senha)) {
        $erro = "A senha é obrigatória.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } elseif ($senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem.";
    } else {
        try {
            // Verifica token novamente
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE reset_token = ? AND reset_expira > NOW()");
            $stmt->execute([$token]);
            $usuario = $stmt->fetch();
            
            if ($usuario) {
                // Atualiza senha e limpa token
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE usuarios SET senha = ?, reset_token = NULL, reset_expira = NULL WHERE id = ?");
                $stmt->execute([$senha_hash, $usuario['id']]);
                
                $_SESSION['mensagem'] = "Senha redefinida com sucesso! Faça login com sua nova senha.";
                header("Location: login.php");
                exit;
            } else {
                $erro = "Token inválido ou expirado. Solicite um novo link de recuperação.";
            }
        } catch (PDOException $e) {
            error_log("Erro ao redefinir senha: " . $e->getMessage());
            $erro = "Erro ao processar sua solicitação. Por favor, tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .reset-container {
            max-width: 500px;
            margin: 5rem auto;
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s;
        }
    </style>
</head>
<body class="bg-light">
    <div class="reset-container">
        <div class="card shadow">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <img src="assets/images/logo-cltreino.png" alt="CLTreino Logo" width="80">
                    <h2 class="mt-3">Redefinir Senha</h2>
                    <p class="text-muted">Crie uma nova senha para sua conta</p>
                </div>

                <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                <?php endif; ?>

                <form method="POST" class="mt-4">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    
                    <div class="mb-3">
                        <label for="senha" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required
                               placeholder="Mínimo 6 caracteres" minlength="6">
                        <div class="password-strength">
                            <div class="password-strength-bar" id="password-strength-bar"></div>
                        </div>
                        <small class="text-muted">A senha deve ter pelo menos 6 caracteres.</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="confirmar_senha" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required
                               placeholder="Digite a senha novamente">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="fas fa-save me-2"></i> Salvar Nova Senha
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Validação de força da senha
        document.getElementById('senha').addEventListener('input', function() {
            const strengthBar = document.getElementById('password-strength-bar');
            const strength = Math.min(this.value.length / 6 * 100, 100);
            
            strengthBar.style.width = strength + '%';
            strengthBar.style.backgroundColor = strength < 50 ? '#dc3545' : 
                                               strength < 80 ? '#ffc107' : '#28a745';
        });

        // Validação de confirmação de senha
        document.querySelector('form').addEventListener('submit', function(e) {
            const senha = document.getElementById('senha').value;
            const confirmar = document.getElementById('confirmar_senha').value;
            
            if (senha !== confirmar) {
                e.preventDefault();
                alert('As senhas não coincidem!');
                document.getElementById('confirmar_senha').focus();
            }
        });
    </script>
</body>
</html>