<?php
require __DIR__ . '/../config/config.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$respostas_corretas = [
    'q1' => 'c',
    'q2' => 'd',  // Alterado de 'D' para 'd'
    'q3' => 'c',
    'q4' => 'b',
    'q5' => 'b',
    'q6' => 'c',
    'q7' => 'a',
    'q8' => 'b',
    'q9' => 'd',
    'q10' => 'b'
];
    
    $pontos = 0;
    foreach ($respostas_corretas as $pergunta => $correta) {
        if (isset($_POST[$pergunta]) && $_POST[$pergunta] == $correta) {
            $pontos += 10;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO resultados (usuario_id, area, pontuacao) VALUES (?, 'eletronica', ?)");
        $stmt->execute([$_SESSION['usuario_id'], $pontos]);
        header("Location: ../../resultados.php?area=eletronica&pontuacao=$pontos");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar resultado: " . $e->getMessage());
    }
}

$titulo = "Questionário de Eletrônica";
include __DIR__ . '/../includes/header.php';
?>
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h2 class="mb-0">
                <i class="fas fa-microchip me-2"></i> Questionário de Eletrônica e Automação
            </h2>
        </div>

        <div class="card-body">
            <form method="post">

                <!-- Questão 1 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>1. Qual das opções abaixo <strong>não é</strong> um componente ativo?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="a" required>
                        <label class="form-check-label" for="q1a">Transistor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1b" value="b">
                        <label class="form-check-label" for="q1b">Diodo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1c" value="c">
                        <label class="form-check-label" for="q1c">Indutor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1d" value="d">
                        <label class="form-check-label" for="q1d">Circuito Integrado</label>
                    </div>
                </div>

                <!-- Questão 2 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>2. Sensores são responsáveis por:</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="a" required>
                        <label class="form-check-label" for="q2a">Executar ações físicas no sistema</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="b">
                        <label class="form-check-label" for="q2b">Armazenar energia elétrica</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2c" value="c">
                        <label class="form-check-label" for="q2c">Controlar sinais digitais</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2d" value="d">
                        <label class="form-check-label" for="q2d">Detectar variáveis do ambiente</label>
                    </div>
                </div>

                <!-- Questão 3 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>3. O que caracteriza um componente <strong>passivo</strong>?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="a" required>
                        <label class="form-check-label" for="q3a">Amplifica sinais elétricos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3b" value="b">
                        <label class="form-check-label" for="q3b">Realiza controle lógico</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="c">
                        <label class="form-check-label" for="q3c">Apenas consome ou armazena energia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3d" value="d">
                        <label class="form-check-label" for="q3d">Executa comandos programados</label>
                    </div>
                </div>

                <!-- Questão 4 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>4. Assinale a alternativa que apresenta <strong>somente sensores</strong>:</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="a" required>
                        <label class="form-check-label" for="q4a">Motor, LDR, Termopar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4b" value="b">
                        <label class="form-check-label" for="q4b">LDR, Termopar, Ultrassônico</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4c" value="c">
                        <label class="form-check-label" for="q4c">Relé, Válvula, LDR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4d" value="d">
                        <label class="form-check-label" for="q4d">Motor, Relé, Diodo</label>
                    </div>
                </div>

                <!-- Questão 5 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>5. Os atuadores são responsáveis por detectar variáveis ambientais.</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="a" required>
                        <label class="form-check-label" for="q5a">Verdadeiro</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="b">
                        <label class="form-check-label" for="q5b">Falso</label>
                    </div>
                </div>

                <!-- Questão 6 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>6. Qual linguagem é mais utilizada para programar CLPs?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6a" value="a" required>
                        <label class="form-check-label" for="q6a">C++</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6b" value="b">
                        <label class="form-check-label" for="q6b">JavaScript</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6c" value="c">
                        <label class="form-check-label" for="q6c">Ladder</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6d" value="d">
                        <label class="form-check-label" for="q6d">HTML</label>
                    </div>
                </div>

                <!-- Questão 7 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>7. Qual software é indicado para esquemas elétricos?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7a" value="a" required>
                        <label class="form-check-label" for="q7a">Proteus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7b" value="b">
                        <label class="form-check-label" for="q7b">Word</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7c" value="c">
                        <label class="form-check-label" for="q7c">PowerPoint</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7d" value="d">
                        <label class="form-check-label" for="q7d">Excel</label>
                    </div>
                </div>

                <!-- Questão 8 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>8. A integração de sistemas de automação envolve apenas hardware.</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8a" value="a" required>
                        <label class="form-check-label" for="q8a">Verdadeiro</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8b" value="b">
                        <label class="form-check-label" for="q8b">Falso</label>
                    </div>
                </div>

                <!-- Questão 9 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>9. Qual das opções é uma etapa do desenvolvimento de projetos em automação?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9a" value="a" required>
                        <label class="form-check-label" for="q9a">Impressão 3D</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9b" value="b">
                        <label class="form-check-label" for="q9b">Teste de resistência dos cabos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9c" value="c">
                        <label class="form-check-label" for="q9c">Cotação de componentes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9d" value="d">
                        <label class="form-check-label" for="q9d">Análise de requisitos</label>
                    </div>
                </div>

                <!-- Questão 10 -->
                <div class="mb-4 p-3 border rounded">
                    <h5>10. A área de Eletrônica e Automação <strong>não inclui</strong>:</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10a" value="a" required>
                        <label class="form-check-label" for="q10a">Programação de microcontroladores</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10b" value="b">
                        <label class="form-check-label" for="q10b">Desenvolvimento de aplicativos móveis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10c" value="c">
                        <label class="form-check-label" for="q10c">Projeto de circuitos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10d" value="d">
                        <label class="form-check-label" for="q10d">Integração entre hardware e software</label>
                    </div>
                </div>

                <!-- Botão de envio -->
                <button type="submit" class="btn btn-dark btn-lg w-100 mt-3" onclick="return confirm('Tem certeza que deseja enviar suas respostas?')">
                    <i class="fas fa-rocket me-2"></i> Enviar Respostas
                </button>
            </form>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../includes/footer.php'; ?>