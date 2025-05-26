<?php
require __DIR__ . '/../config/config.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

// Processa as respostas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respostas_corretas = [
        'q1' => 'b', 'q2' => 'a', 'q3' => 'c', 'q4' => 'd', 'q5' => 'a',
        'q6' => 'b', 'q7' => 'c', 'q8' => 'a', 'q9' => 'd', 'q10' => 'b'
    ];
    
    $pontos = 0;
    foreach ($respostas_corretas as $pergunta => $correta) {
        if (isset($_POST[$pergunta]) && $_POST[$pergunta] == $correta) {
            $pontos += 10;
        }
    }

    // Salva no banco
    $stmt = $pdo->prepare("INSERT INTO resultados (usuario_id, area, pontuacao) VALUES (?, 'logistica', ?)");
    $stmt->execute([$_SESSION['usuario_id'], $pontos]);
    
    header("Location: ../resultados.php?area=logistica&pontuacao=$pontos");
    exit;
}

$titulo = "Questionário de Logística";
include '../includes/header.php';
?>

<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2><i class="fas fa-truck"></i> Questionário de Logística (10 Perguntas)</h2>
        </div>
        
        <div class="card-body">
            <form method="post">
                <!-- Questão 1 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>1. O que significa o termo "lead time" em logística?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="a" required>
                        <label class="form-check-label" for="q1a">Tempo de produção</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1b" value="b">
                        <label class="form-check-label" for="q1b">Tempo entre pedido e entrega</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Explicação:</strong> Lead time é o tempo total desde o pedido do cliente até a entrega final, incluindo processamento, produção e transporte.</small>
                    </div>
                </div>

                <!-- Questão 2 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>2. Qual é a função principal de um WMS (Warehouse Management System)?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="a" required>
                        <label class="form-check-label" for="q2a">Otimizar operações de armazém</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="b">
                        <label class="form-check-label" for="q2b">Gerenciar frota de veículos</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Explicação:</strong> WMS controla estoque, endereçamento, picking e packing em armazéns.</small>
                    </div>
                </div>

                <!-- Questão 3 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>3. O que é cross-docking?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="a" required>
                        <label class="form-check-label" for="q3a">Armazenamento de longo prazo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="c">
                        <label class="form-check-label" for="q3c">Transferência direta entre veículos</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Explicação:</strong> Técnica que elimina armazenagem, transferindo mercadorias diretamente do veículo de entrada para o de saída.</small>
                    </div>
                </div>

                <!-- Questão 4 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>4. Qual modal de transporte é mais adequado para produtos perecíveis?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="a" required>
                        <label class="form-check-label" for="q4a">Ferroviário</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4d" value="d">
                        <label class="form-check-label" for="q4d">Rodoviário refrigerado</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Explicação:</strong> Rodoviário refrigerado oferece flexibilidade e controle de temperatura para perecíveis.</small>
                    </div>
                </div>

                <!-- Questão 5 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>5. O que significa FIFO em gestão de estoques?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="a" required>
                        <label class="form-check-label" for="q5a">First In, First Out</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="b">
                        <label class="form-check-label" for="q5b">First In, Last Out</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Explicação:</strong> FIFO garante que os primeiros itens a entrar no estoque sejam os primeiros a sair, evitando obsolescência.</small>
                    </div>
                </div>

                <!-- Adicione mais 5 questões seguindo o mesmo padrão -->

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                    <i class="fas fa-check-circle"></i> Finalizar Questionário
                </button>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>