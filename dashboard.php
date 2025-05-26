<?php
require __DIR__ . '/config/config.php';
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Busca os resultados do usuário
$stmt = $pdo->prepare("SELECT * FROM resultados WHERE usuario_id = ? ORDER BY data_teste DESC");
$stmt->execute([$_SESSION['usuario_id']]);
$resultados = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body text-center">
                <img src="<?= $_SESSION['usuario_foto'] ?? 'assets/images/user-default.png' ?>" 
             class="rounded-circle mb-3" 
             id="foto-perfil-preview" 
             width="150" 
             height="150"
             style="object-fit: cover;">
                    <h5><?= htmlspecialchars($_SESSION['usuario_nome']) ?></h5>
                    <p class="text-muted">Membro desde <?= date('d/m/Y', strtotime($_SESSION['data_cadastro'] ?? 'now')) ?></p>
                </div>
            </div>
            <div class="card mb-4">
    <div class="card-header">Foto de Perfil</div>
    <div class="card-body text-center">

        
        <form id="form-foto-perfil" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" 
                       class="form-control" 
                       id="foto-perfil" 
                       name="foto_perfil"
                       accept="image/*">
                <button class="btn btn-primary" type="submit">Atualizar</button>
            </div>
            <small class="text-muted">Formatos aceitos: JPG, PNG (Máx. 2MB)</small>
        </form>
    </div>
</div>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h6>Minhas Áreas</h6>
                </div>
                <div class="list-group list-group-flush">
                    <a href="profissoes/logistica.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-truck me-2"></i> Logística
                    </a>
                    <a href="profissoes/textil.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-tshirt me-2"></i> Têxtil e Moda
                    </a>
                    <a href="profissoes/seguranca.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-hard-hat me-2"></i> Segurança
                    </a>
                    <a href="profissoes/eletronica.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-microchip me-2"></i> Eletrônica
                    </a>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Meu Progresso</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Card Logística -->
                        <div class="col-md-3 mb-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <h6 class="text-primary">Logística</h6>
                                    <?php
                                    $pontuacao = obterPontuacao($resultados, 'logistica');
                                    echo exibirProgresso($pontuacao);
                                    ?>
                                    <a href="questionarios/logistica_quiz.php" class="btn btn-sm btn-outline-primary mt-2">Refazer Teste</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Têxtil -->
                        <div class="col-md-3 mb-3">
                            <div class="card border-success">
                                <div class="card-body text-center">
                                    <h6 class="text-success">Têxtil</h6>
                                    <?php
                                    $pontuacao = obterPontuacao($resultados, 'textil');
                                    echo exibirProgresso($pontuacao);
                                    ?>
                                    <a href="questionarios/textil_quiz.php" class="btn btn-sm btn-outline-success mt-2">Refazer Teste</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Segurança -->
                        <div class="col-md-3 mb-3">
                            <div class="card border-danger">
                                <div class="card-body text-center">
                                    <h6 class="text-danger">Segurança</h6>
                                    <?php
                                    $pontuacao = obterPontuacao($resultados, 'seguranca');
                                    echo exibirProgresso($pontuacao);
                                    ?>
                                    <a href="questionarios/seguranca_quiz.php" class="btn btn-sm btn-outline-danger mt-2">Refazer Teste</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Eletrônica -->
                        <div class="col-md-3 mb-3">
                            <div class="card border-dark">
                                <div class="card-body text-center">
                                    <h6 class="text-dark">Eletrônica</h6>
                                    <?php
                                    $pontuacao = obterPontuacao($resultados, 'eletronica');
                                    echo exibirProgresso($pontuacao);
                                    ?>
                                    <a href="questionarios/eletronica_quiz.php" class="btn btn-sm btn-outline-dark mt-2">Refazer Teste</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Adicione isso no seu dashboard.php -->

            <!-- Histórico Completo -->
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Histórico de Atividades</h4>
                </div>
                <div class="card-body">
                    <?php if (empty($resultados)): ?>
                        <div class="alert alert-info">Nenhum resultado encontrado.</div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Área</th>
                                        <th>Pontuação</th>
                                        <th>Data</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($resultados as $resultado): ?>
                                        <tr>
                                            <td><?= ucfirst($resultado['area']) ?></td>
                                            <td>
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar" style="width: <?= $resultado['pontuacao'] ?>%">
                                                        <?= $resultado['pontuacao'] ?>%
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($resultado['data_teste'])) ?></td>
                                            <td>
                                                <a href="profissoes/<?= $resultado['area'] ?>.php" class="btn btn-sm btn-outline-primary">Ver Matéria</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Funções auxiliares (coloque no final do arquivo ou em includes/functions.php)
function obterPontuacao($resultados, $area) {
    foreach ($resultados as $resultado) {
        if ($resultado['area'] === $area) {
            return $resultado['pontuacao'];
        }
    }
    return 0;
}

function exibirProgresso($pontuacao) {
    $classe = match (true) {
        $pontuacao >= 80 => 'success',
        $pontuacao >= 50 => 'warning',
        default => 'danger'
    };
    
    return <<<HTML
        <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-$classe" role="progressbar" style="width: $pontuacao%"></div>
        </div>
        <small>$pontuacao% completo</small>
    HTML;
}

include 'includes/footer.php';
?>

<script>
document.getElementById('form-foto-perfil').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    const fileInput = document.getElementById('foto-perfil');
    
    if (fileInput.files.length === 0) {
        alert('Selecione uma foto!');
        return;
    }
    
    formData.append('foto_perfil', fileInput.files[0]);
    
    fetch('upload_foto.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.erro) {
            alert('Erro: ' + data.erro);
        } else {
            document.getElementById('foto-perfil-preview').src = data.caminho;
            alert('Foto atualizada com sucesso!');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao processar a foto');
    });
});

// Pré-visualização da imagem antes do upload
document.getElementById('foto-perfil').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('foto-perfil-preview').src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>