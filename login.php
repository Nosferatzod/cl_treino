<?php
// Primeira linha absoluta do arquivo - SEM espaços antes!
require __DIR__ . '/config/config.php';

// Inicia a sessão antes de qualquer output
session_start();

// Redireciona se já estiver logado
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit;
}
//CUIDADO COM O QUE FOR MECHER eheh
// Processa o formulário
$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Autenticação bem-sucedida
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_foto'] = $usuario['foto_perfil'] ?? 'assets/images/user-default.png';

            // Redireciona com JavaScript como fallback
            echo '<script>window.location.href = "dashboard.php";</script>';
            exit;
        } else {
            $erro = "Credenciais inválidas!";
        }
    } catch (PDOException $e) {
        error_log("Erro de login: " . $e->getMessage());
        $erro = "Erro no sistema. Por favor, tente mais tarde.";
    }
}

// Define o título da página
$titulo = "Login";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">
    <div class="login-container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <!-- Logo/Cabeçalho -->
                <div class="login-logo">
                    <img src="./assets/svg/logo.svg" alt="CLTreino Logo">
                    <h2 class="mt-3">CLTreino</h2>
                </div>
                <?php if (isset($mensagem)): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($mensagem) ?>
                    </div>
                <?php endif; ?>
                <!-- Mensagens de erro/sucesso -->
                <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso'): ?>
                    <div class="alert alert-success">
                        Cadastro realizado! Faça login para continuar.
                    </div>
                <?php endif; ?>

                <?php if (!empty($erro)): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($erro) ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Login -->
                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            required
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password"
                            class="form-control"
                            id="senha"
                            name="senha"
                            required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i> Entrar
                        </button>
                    </div>
                </form>

                <!-- Links extras -->
                <div class="mt-3 text-center">
                    <a href="recuperar-senha.php">Esqueceu a senha?</a>
                    <span class="mx-2">•</span>
                    <a href="cadastro.php">Criar conta</a>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>