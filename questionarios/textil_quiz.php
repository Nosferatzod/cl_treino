<?php
require __DIR__ . '/../config/config.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respostas_corretas = [
        'q1' => 'b',
        'q2' => 'c',
        'q3' => 'a',
        'q4' => 'd',
        'q5' => 'b',
        'q6' => 'a',
        'q7' => 'c',
        'q8' => 'd',
        'q9' => 'b',
        'q10' => 'a'
    ];
    
    $pontos = 0;
    foreach ($respostas_corretas as $pergunta => $correta) {
        if (isset($_POST[$pergunta]) && $_POST[$pergunta] == $correta) {
            $pontos += 10; // 10 pontos por questão (total 100)
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO resultados (usuario_id, area, pontuacao) VALUES (?, 'textil', ?)");
        $stmt->execute([$_SESSION['usuario_id'], $pontos]);
        header("Location: ../../resultados.php?area=textil&pontuacao=$pontos");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar resultado: " . $e->getMessage());
    }
}

$titulo = "Questionário de Têxtil";
include __DIR__ . '/../includes/header.php';
?>

<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">
                <i class="fas fa-tshirt me-2"></i> Questionário de Têxtil e Moda
            </h2>
            <p class="mb-0 mt-2">Teste seus conhecimentos sobre a indústria têxtil e de confecção</p>
        </div>
        
        <div class="card-body">
            <form method="post">
                <!-- Questão 1 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>1. Qual destes tecidos é considerado um tecido plano?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="a" required>
                        <label class="form-check-label" for="q1a">Malha</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1b" value="b">
                        <label class="form-check-label" for="q1b">Popeline</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1c" value="c">
                        <label class="form-check-label" for="q1c">Jersey</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1d" value="d">
                        <label class="form-check-label" for="q1d">Ribana</label>
                    </div>
                </div>

                <!-- Questão 2 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>2. O que significa o termo "prêt-à-porter" na moda?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="a" required>
                        <label class="form-check-label" for="q2a">Moda sob medida</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="b">
                        <label class="form-check-label" for="q2b">Moda sustentável</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2c" value="c">
                        <label class="form-check-label" for="q2c">Moda pronta para vestir</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2d" value="d">
                        <label class="form-check-label" for="q2d">Moda vintage</label>
                    </div>
                </div>

                <!-- Questão 3 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>3. Qual fibra têxtil é de origem animal?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="a" required>
                        <label class="form-check-label" for="q3a">Lã</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3b" value="b">
                        <label class="form-check-label" for="q3b">Poliester</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="c">
                        <label class="form-check-label" for="q3c">Viscose</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3d" value="d">
                        <label class="form-check-label" for="q3d">Acrílico</label>
                    </div>
                </div>

                <!-- Questão 4 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>4. Qual etapa do processo têxtil transforma fibras em fios?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="a" required>
                        <label class="form-check-label" for="q4a">Tingimento</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4b" value="b">
                        <label class="form-check-label" for="q4b">Tecelagem</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4c" value="c">
                        <label class="form-check-label" for="q4c">Estamparia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4d" value="d">
                        <label class="form-check-label" for="q4d">Fiação</label>
                    </div>
                </div>

                <!-- Questão 5 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>5. O que é um tecido Jacquard?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="a" required>
                        <label class="form-check-label" for="q5a">Tecido com elastano</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="b">
                        <label class="form-check-label" for="q5b">Tecido com padrões complexos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5c" value="c">
                        <label class="form-check-label" for="q5c">Tecido impermeável</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5d" value="d">
                        <label class="form-check-label" for="q5d">Tecido transparente</label>
                    </div>
                </div>

                <!-- Questão 6 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>6. Qual destes é um processo de acabamento têxtil?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6a" value="a" required>
                        <label class="form-check-label" for="q6a">Mercerização</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6b" value="b">
                        <label class="form-check-label" for="q6b">Padronização</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6c" value="c">
                        <label class="form-check-label" for="q6c">Fiação</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6d" value="d">
                        <label class="form-check-label" for="q6d">Cardagem</label>
                    </div>
                </div>

                <!-- Questão 7 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>7. O que significa o termo "moda sustentável"?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7a" value="a" required>
                        <label class="form-check-label" for="q7a">Moda cara</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7b" value="b">
                        <label class="form-check-label" for="q7b">Moda exclusiva</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7c" value="c">
                        <label class="form-check-label" for="q7c">Moda ecologicamente correta</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7d" value="d">
                        <label class="form-check-label" for="q7d">Moda vintage</label>
                    </div>
                </div>

                <!-- Questão 8 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>8. Qual destas fibras é sintética?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8a" value="a" required>
                        <label class="form-check-label" for="q8a">Algodão</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8b" value="b">
                        <label class="form-check-label" for="q8b">Linho</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8c" value="c">
                        <label class="form-check-label" for="q8c">Seda</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8d" value="d">
                        <label class="form-check-label" for="q8d">Poliéster</label>
                    </div>
                </div>

                <!-- Questão 9 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>9. O que é um "moodboard" no design de moda?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9a" value="a" required>
                        <label class="form-check-label" for="q9a">Uma máquina de costura</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9b" value="b">
                        <label class="form-check-label" for="q9b">Um painel de inspiração visual</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9c" value="c">
                        <label class="form-check-label" for="q9c">Um tipo de tecido</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9d" value="d">
                        <label class="form-check-label" for="q9d">Uma técnica de estamparia</label>
                    </div>
                </div>

                <!-- Questão 10 -->
                <div class="mb-4 p-3 border rounded quiz-question">
                    <h5>10. Qual destes é um tipo de ponto básico na costura?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10a" value="a" required>
                        <label class="form-check-label" for="q10a">Ponto reto</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10b" value="b">
                        <label class="form-check-label" for="q10b">Ponto Jacquard</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10c" value="c">
                        <label class="form-check-label" for="q10c">Ponto de fiação</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10d" value="d">
                        <label class="form-check-label" for="q10d">Ponto de tingimento</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100 mt-3">
                    <i class="fas fa-check-circle me-2"></i> Finalizar Questionário
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    .quiz-question {
        transition: all 0.3s ease;
        background-color: rgba(255, 255, 255, 0.8);
    }
    
    .quiz-question:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>