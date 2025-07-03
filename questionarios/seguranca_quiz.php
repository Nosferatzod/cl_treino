<?php
require __DIR__ . '/../config/config.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$respostas_corretas = [
    'q1' => 'b',  // NR 6 (EPIs)
    'q2' => 'a',  // Risco Químico
    'q3' => 'b',  // Protetor auricular
    'q4' => 'c',  // Fornecer gratuitamente e em perfeito estado
    'q5' => 'b',  // Extintor de incêndio (EPC)
    'q6' => 'a',  // NR 7 (PCMSO)
    'q7' => 'b',  // Proteger o trabalhador contra riscos à saúde
    'q8' => 'c',  // NR 35 (Trabalhos em altura)
    'q9' => 'b',  // Grade de proteção (NÃO é EPI, é EPC)
    'q10' => 'a'  // NR 5 (CIPA)
];

    $pontos = 0;
    foreach ($respostas_corretas as $pergunta => $correta) {
        if (isset($_POST[$pergunta]) && $_POST[$pergunta] == $correta) {
            $pontos += 10;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO resultados (usuario_id, area, pontuacao) VALUES (?, 'seguranca', ?)");
        $stmt->execute([$_SESSION['usuario_id'], $pontos]);
        header("Location: ../../resultados.php?area=seguranca&pontuacao=$pontos");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar resultado: " . $e->getMessage());
    }
}

$titulo = "Questionário de Segurança";
include __DIR__ . '/../includes/header.php';
?>

<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h2 class="mb-0">
                <i class="fas fa-hard-hat me-2"></i> Questionário de Segurança do Trabalho
            </h2>
            <small class="fw-light">Responda corretamente para receber seu certificado</small>
        </div>

        <div class="card-body">
            <form method="post">
                <!-- Questão 1 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>1. Qual NR regulamenta o uso de EPIs?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="a" required>
                        <label class="form-check-label" for="q1a">NR 12</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1c" value="c">
                        <label class="form-check-label" for="q1c">NR 6</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Existe uma NR específica que trata exclusivamente sobre os equipamentos individuais de proteção e sua obrigatoriedade.</small>
                    </div>
                </div>

                <!-- Questão 2 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>2. Qual risco está representado pelo símbolo abaixo?</h5>
                    <img src="https://raw.githubusercontent.com/LSFFODA/aleatoriedade/refs/heads/main/icons8-risco-biol%C3%B3gico-48.png" class="img-fluid mb-3" style="max-height: 100px;">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="a" required>
                        <label class="form-check-label" for="q2a">Risco Químico</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="b">
                        <label class="form-check-label" for="q2b">Risco Biológico</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Este símbolo é amplamente usado para indicar a presença de substâncias que podem causar intoxicações ou reações químicas perigosas.</small>
                    </div>
                </div>

                <!-- Questão 3 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>3. Qual destes equipamentos é considerado um EPI para proteção auditiva?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="a" required>
                        <label class="form-check-label" for="q3a">Óculos de segurança</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3b" value="b">
                        <label class="form-check-label" for="q3b">Protetor auricular</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="c">
                        <label class="form-check-label" for="q3c">Luvas de borracha</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3d" value="d">
                        <label class="form-check-label" for="q3d">Botina de segurança</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> O equipamento correto ajuda a prevenir perdas auditivas causadas pela exposição prolongada a ruídos intensos.</small>
                    </div>
                </div>

                <!-- Questão 4 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>4. Segundo a NR 6, qual é a responsabilidade do empregador quanto aos EPIs?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="a" required>
                        <label class="form-check-label" for="q4a">Fornecer apenas quando o empregado solicitar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4b" value="b">
                        <label class="form-check-label" for="q4b">Cobrar do empregado o valor do EPI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4c" value="c">
                        <label class="form-check-label" for="q4c">Fornecer gratuitamente e em perfeito estado</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4d" value="d">
                        <label class="form-check-label" for="q4d">Compartilhar EPIs entre vários funcionários</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> A legislação determina que a responsabilidade pelo fornecimento, manutenção e orientação quanto ao uso dos EPIs é do empregador.</small>
                    </div>
                </div>

                <!-- Questão 5 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>5. Qual destes é um exemplo de Equipamento de Proteção Coletiva (EPC)?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="a" required>
                        <label class="form-check-label" for="q5a">Capacete de segurança</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="b">
                        <label class="form-check-label" for="q5b">Extintor de incêndio</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5c" value="c">
                        <label class="form-check-label" for="q5c">Máscara respiratória</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5d" value="d">
                        <label class="form-check-label" for="q5d">Óculos de proteção</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Diferente dos EPIs, esses equipamentos protegem coletivamente vários trabalhadores ao mesmo tempo.</small>
                    </div>
                </div>

                <!-- Questão 6 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>6. Qual NR estabelece as diretrizes para a implementação do PCMSO?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6a" value="a" required>
                        <label class="form-check-label" for="q6a">NR 7</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6b" value="b">
                        <label class="form-check-label" for="q6b">NR 5</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6c" value="c">
                        <label class="form-check-label" for="q6c">NR 17</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6" id="q6d" value="d">
                        <label class="form-check-label" for="q6d">NR 35</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Este programa visa preservar a saúde dos trabalhadores através de ações de prevenção e monitoramento.</small>
                    </div>
                </div>

                <!-- Questão 7 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>7. Qual é a função principal de um EPI?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7a" value="a" required>
                        <label class="form-check-label" for="q7a">Melhorar a produtividade do trabalhador</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7b" value="b">
                        <label class="form-check-label" for="q7b">Proteger o trabalhador contra riscos à saúde</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7c" value="c">
                        <label class="form-check-label" for="q7c">Substituir as medidas de proteção coletiva</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7" id="q7d" value="d">
                        <label class="form-check-label" for="q7d">Servir como uniforme da empresa</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> EPIs são sempre considerados barreiras de proteção contra riscos ocupacionais específicos.</small>
                    </div>
                </div>

                <!-- Questão 8 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>8. Qual NR trata especificamente de trabalhos em altura?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8a" value="a" required>
                        <label class="form-check-label" for="q8a">NR 10</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8b" value="b">
                        <label class="form-check-label" for="q8b">NR 12</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8c" value="c">
                        <label class="form-check-label" for="q8c">NR 35</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8" id="q8d" value="d">
                        <label class="form-check-label" for="q8d">NR 6</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Esta norma visa garantir a segurança na execução de atividades que envolvam risco de queda de altura.</small>
                    </div>
                </div>

                <!-- Questão 9 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>9. Qual destes equipamentos NÃO é considerado um EPI?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9a" value="a" required>
                        <label class="form-check-label" for="q9a">Cinto de segurança</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9b" value="b">
                        <label class="form-check-label" for="q9b">Grade de proteção</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9c" value="c">
                        <label class="form-check-label" for="q9c">Máscara de solda</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9" id="q9d" value="d">
                        <label class="form-check-label" for="q9d">Protetor facial</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Nem todo dispositivo de segurança é considerado EPI; alguns são classificados como barreiras físicas ou EPCs.</small>
                    </div>
                </div>

                <!-- Questão 10 -->
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5>10. Qual é a NR que estabelece os requisitos mínimos para a CIPA?</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10a" value="a" required>
                        <label class="form-check-label" for="q10a">NR 5</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10b" value="b">
                        <label class="form-check-label" for="q10b">NR 6</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10c" value="c">
                        <label class="form-check-label" for="q10c">NR 7</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q10" id="q10d" value="d">
                        <label class="form-check-label" for="q10d">NR 10</label>
                    </div>
                    <div class="alert alert-info mt-2 p-2">
                        <small><strong>Dica:</strong> Esta norma trata da Comissão Interna de Prevenção de Acidentes, responsável por promover a segurança e saúde no ambiente de trabalho.</small>
                    </div>
                </div>

                <!-- Timer e botão -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        <i class="fas fa-clock me-2"></i>
                        <span id="timer">05:00</span>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-check me-2"></i> Finalizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let timeLeft = 300;
    const timer = document.getElementById('timer');

    setInterval(() => {
        timeLeft--;
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        if (timeLeft <= 0) {
            document.querySelector('form').submit();
        }
    }, 1000);
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
