<?php
// Início absoluto do arquivo - SEM espaços ou quebras de linha antes!
require __DIR__ . '/config/config.php';
session_start();
// Exibe mensagens de feedback
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
}
// Adicione no início do arquivo, após a verificação de autenticação
if (isset($_GET['excluir'])) {
    $id_excluir = filter_input(INPUT_GET, 'excluir', FILTER_VALIDATE_INT);

    if ($id_excluir) {
        try {
            $stmt = $pdo->prepare("DELETE FROM resultados WHERE id = ? AND usuario_id = ?");
            $stmt->execute([$id_excluir, $_SESSION['usuario_id']]);

            $_SESSION['mensagem'] = "Resultado excluído com sucesso!";
            header("Location: resultados.php");
            exit;
        } catch (PDOException $e) {
            die("Erro ao excluir resultado: " . $e->getMessage());
        }
    }
}
// Verifica autenticação
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Obtém dados do resultado atual
$area = filter_input(INPUT_GET, 'area', FILTER_SANITIZE_STRING) ?? '';
$pontuacao = filter_input(INPUT_GET, 'pontuacao', FILTER_VALIDATE_INT) ?? 0;

// Busca histórico completo
try {
    $stmt = $pdo->prepare("SELECT * FROM resultados WHERE usuario_id = ? ORDER BY data_teste DESC");
    $stmt->execute([$_SESSION['usuario_id']]);
    $historico = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro ao carregar resultados: " . $e->getMessage());
}

// Define título dinâmico
$titulo = "Resultados - " . ucfirst($area);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .progresso-circular {
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            position: relative;
        }

        .progresso-numero {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.5rem;
            font-weight: bold;
        }

        .badge-area {
            font-size: 1rem;
            padding: 8px 15px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <main class="container py-5">
        <!-- Resultado Atual -->

        <section class="text-center mb-5">
            <h1 class="mb-4">
                <?php if ($area): ?>
                    <span class="badge 
                        <?= match ($area) {
                            'logistica' => 'bg-primary',
                            'textil' => 'bg-success',
                            'seguranca' => 'bg-danger',
                            'eletronica' => 'bg-dark',
                            default => 'bg-secondary'
                        } ?> badge-area">
                        <?= ucfirst($area) ?>
                    </span>
                <?php endif; ?>
                Seu Resultado
            </h1>

            <div class="progresso-circular">
                <svg viewBox="0 0 36 36" class="circular-chart">
                    <path class="circle-bg"
                        d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="#eee"
                        stroke-width="3" />
                    <path class="circle-fill"
                        d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="<?= match (true) {
                                    $pontuacao >= 80 => '#28a745',
                                    $pontuacao >= 50 => '#ffc107',
                                    default => '#dc3545'
                                } ?>"
                        stroke-width="3"
                        stroke-dasharray="<?= $pontuacao ?>, 100" />
                </svg>
                <div class="progresso-numero text-<?= match (true) {
                                                        $pontuacao >= 80 => 'success',
                                                        $pontuacao >= 50 => 'warning',
                                                        default => 'danger'
                                                    } ?>">
                    <?= $pontuacao ?>%
                </div>
            </div>

            <div class="alert alert-<?= match (true) {
                                        $pontuacao >= 80 => 'success',
                                        $pontuacao >= 50 => 'warning',
                                        default => 'danger'
                                    } ?> col-md-6 mx-auto">
                <h4>
                    <?= match (true) {
                        $pontuacao >= 80 => 'Excelente!',
                        $pontuacao >= 50 => 'Bom trabalho!',
                        default => 'Continue praticando!'
                    } ?>
                </h4>
                <p class="mb-0">
                    <?= match (true) {
                        $pontuacao >= 80 => 'Você dominou os conceitos principais desta área.',
                        $pontuacao >= 50 => 'Você está no caminho certo, mas pode melhorar.',
                        default => 'Recomendamos revisar o material antes de tentar novamente.'
                    } ?>
                </p>
            </div>

            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="profissoes/<?= $area ?>.php" class="btn btn-outline-dark">
                    <i class="fas fa-book me-2"></i> Revisar Matéria
                </a>
                <a href="questionarios/<?= $area ?>_quiz.php" class="btn btn-primary">
                    <i class="fas fa-redo me-2"></i> Tentar Novamente
                </a>
            </div>
        </section>

        <!-- Histórico Completo -->
        <section class="mt-5">
            <h2 class="mb-4 text-center">
                <i class="fas fa-history me-2"></i> Seu Histórico
            </h2>
            
            <?php if (empty($historico)): ?>
                <div class="alert alert-info text-center">
                    Nenhum resultado registrado ainda.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Área</th>
                                <th>Pontuação</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historico as $registro): ?>
                                <tr>
                                    <td>
                                        <span class="badge 
                                            <?= match ($registro['area']) {
                                                'logistica' => 'bg-primary',
                                                'textil' => 'bg-success',
                                                'seguranca' => 'bg-danger',
                                                'eletronica' => 'bg-dark',
                                                default => 'bg-secondary'
                                            } ?>">
                                            <?= ucfirst($registro['area']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar 
                                                <?= match (true) {
                                                    $registro['pontuacao'] >= 80 => 'bg-success',
                                                    $registro['pontuacao'] >= 50 => 'bg-warning',
                                                    default => 'bg-danger'
                                                } ?>"
                                                style="width: <?= $registro['pontuacao'] ?>%">
                                                <?= $registro['pontuacao'] ?>%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y H:i', strtotime($registro['data_teste'])) ?>
                                    </td>
                                    <td>
                                        <a href="profissoes/<?= $registro['area'] ?>.php" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye">Materia</i>
                                        </a>
                                        <a href="resultados.php?excluir=<?= $registro['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Tem certeza que deseja excluir este resultado?')">
                                            <i class="fas fa-trash">ExcLuir</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- Gráfico circular dinâmico -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const circle = document.querySelector('.circle-fill');
            const radius = circle.r.baseVal.value;
            const circumference = 2 * Math.PI * radius;

            circle.style.strokeDasharray = `${circumference} ${circumference}`;
            circle.style.strokeDashoffset = circumference;

            const offset = circumference - (<?= $pontuacao ?> / 100 * circumference);
            circle.style.strokeDashoffset = offset;
        });
    </script>
</body>

</html>