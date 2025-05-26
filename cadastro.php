<?php
require __DIR__ . '/config/config.php';
include 'includes/header.php';
$titulo = "Cadastro";

// Adicione estas colunas no seu banco de dados antes de usar:
// ALTER TABLE usuarios ADD COLUMN cpf VARCHAR(14) NULL;
// ALTER TABLE usuarios ADD COLUMN telefone VARCHAR(15) NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $telefone = preg_replace('/[^0-9]/', '', $_POST['telefone']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        // Verifica se CPF já existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = ?");
        $stmt->execute([$cpf]);
        if ($stmt->fetch()) {
            throw new Exception("CPF já cadastrado.");
        }

        // Verifica se email já existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            throw new Exception("Email já cadastrado.");
        }

        // Insere novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, cpf, telefone, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $cpf, $telefone, $senha]);
        
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso! Faça login para continuar.";
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro no sistema: " . $e->getMessage();
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0 text-center">Crie sua conta</h4>
                </div>
                <div class="card-body p-4 p-md-5">
                    <?php if (isset($erro)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
                    <?php endif; ?>

                    <form method="POST" id="formCadastro">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nome" class="form-label">Nome Completo *</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cpf" class="form-label">CPF *</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required
                                       placeholder="000.000.000-00">
                            </div>

                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone *</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" required
                                       placeholder="(00) 00000-0000">
                            </div>

                            <div class="col-md-6">
                                <label for="senha" class="form-label">Senha *</label>
                                <input type="password" class="form-control" id="senha" name="senha" required
                                       minlength="6">
                                <small class="text-muted">Mínimo 6 caracteres</small>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i> Cadastrar
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">Já tem uma conta? <a href="login.php">Faça login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Máscaras para CPF e Telefone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#telefone').mask('(00) 00000-0000');
    
    // Validação básica do formulário
    $('#formCadastro').submit(function() {
        const cpf = $('#cpf').cleanVal();
        if (cpf.length !== 11) {
            alert('CPF inválido. Digite 11 números.');
            return false;
        }
        
        const telefone = $('#telefone').cleanVal();
        if (telefone.length < 11) {
            alert('Telefone inválido. Digite o DDD + número.');
            return false;
        }
        
        return true;
    });
});
</script>