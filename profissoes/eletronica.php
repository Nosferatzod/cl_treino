<?php
session_start();
require __DIR__ . '/../config/config.php';
include '../includes/header.php';
$titulo = "Eletrônica e Automação";
?>

<link rel="stylesheet" href="../assets/css/paginas.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container">

    <div class="row">
        <!-- Conteúdo Educacional -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
            <div class="card-header bg-dark text-white">
                <h3><i class="bi bi-lightning-charge"></i> Fundamentos da Eletrônica e Automação</h3>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4 class="text-dark"><i class="bi bi-cpu me-2"></i>O Que É Eletrônica e Automação?</h4>
                    <p>A área de Eletrônica e Automação engloba o projeto, desenvolvimento e implementação de sistemas eletrônicos e automatizados. Ela se divide em três grandes áreas:</p>
                    <ol>
                        <li><strong>Eletrônica Analógica/Digital:</strong> Projeto de circuitos eletrônicos</li>
                        <li><strong>Microcontroladores/PLCs:</strong> Programação de dispositivos de controle</li>
                        <li><strong>Automação Industrial:</strong> Integração de sistemas automatizados</li>
                    </ol>
                </div>

                <div class="mb-4">
                    <h4 class="text-dark"><i class="bi bi-border-width me-2"></i>Componentes Eletrônicos</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3 border rounded mb-3 bg-light">
                                <h5>Componentes Passivos</h5>
                                <p>Elementos que não amplificam sinais, como:</p>
                                <ul>
                                    <li>Resistores</li>
                                    <li>Capacitores</li>
                                    <li>Indutores</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded mb-3 bg-light">
                                <h5>Componentes Ativos</h5>
                                <p>Elementos que amplificam ou controlam sinais, como:</p>
                                <ul>
                                    <li>Transistores</li>
                                    <li>Diodos</li>
                                    <li>Circuitos Integrados</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-dark"><i class="fas fa-warehouse me-2"></i>Sensores e Atuadores</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Função</th>
                                    <th>Exemplos</th>
                                    <th>Aplicações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sensores</td>
                                    <td>Detecção de variáveis</td>
                                    <td>Termopar, LDR, Ultrassônico</td>
                                    <td>Controle de temperatura, presença</td>
                                </tr>
                                <tr>
                                    <td>Atuadores</td>
                                    <td>Execução de ações</td>
                                    <td>Motores, Válvulas, Relés</td>
                                    <td>Movimentação, controle de fluxo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-dark"><i class="bi bi-gear-wide me-2"></i>Processos em Automação</h4>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 border-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">1. Projeto de Circuitos</h5>
                                    <p class="card-text">Desenvolvimento de esquemas elétricos usando softwares como Proteus ou Eagle.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">2. Programação</h5>
                                    <p class="card-text">Código para microcontroladores (Arduino) e CLPs (Ladder, ST).</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">3. Integração</h5>
                                    <p class="card-text">Conexão entre hardware, software e dispositivos de campo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-dark"><i class="bi bi-diagram-3 me-2"></i>Desenvolvimento de Projetos</h4>
                    <p>O processo de criação em automação envolve:</p>
                    <div class="process-steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <strong>Análise de Requisitos</strong>: Definição de objetivos e especificações
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <strong>Projeto Conceitual</strong>: Esquemas e diagramas preliminares
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <strong>Implementação</strong>: Montagem de circuitos e programação
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <strong>Testes e Validação</strong>: Verificação do funcionamento do sistema
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Sidebar com Quiz e Recursos -->
        <div class="col-lg-4">
            <!-- Card do Quiz -->
            <div class="card shadow mb-4 border-dark">
                <div class="card-header bg-dark text-white">
                    <h4><i class="fas fa-clipboard-check me-2"></i> Teste Seu Conhecimento</h4>
                </div>
                <div class="card-body text-center">
                    <img src="../assets/images/treinamento.png" class="img-fluid rounded mb-3" alt="Quiz de Têxtil">
                    <p>Agora que você aprendeu os conceitos básicos, teste seu conhecimento com nosso questionário de 10 perguntas!</p>
                    <div class="d-grid gap-2">
                        <a href="../questionarios/eletronica_quiz.php" class="btn btn-dark btn-lg">
                            <i class="fas fa-play me-2"></i> Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recursos Adicionais -->
            <div class="card shadow border-dark">
                <div class="card-header bg-dark text-white">
                    <h4><i class="fas fa-bookmark me-2"></i> Recursos Adicionais</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-dark"><i class="fas fa-video me-2"></i> Vídeo: Processo de Microcontroladores</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-dark"><i class="fas fa-image me-2"></i> Galeria: Tipos de Capacitores</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-dark"><i class="fas fa-file-pdf me-2"></i> Glossário Eletrônico e Automoção</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
 .process-steps {
        position: relative;
        padding-left: 50px;
    }
    
    .process-steps::before {
        content: "";
        position: absolute;
        left: 25px;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color:rgb(12, 14, 12);
    }
    
    .step {
        position: relative;
        margin-bottom: 20px;
    }
    
    .step-number {
        position: absolute;
        left: -40px;
        width: 40px;
        height: 40px;
        background-color: rgb(12, 14, 12);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    .step-content {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 3px solid rgb(12, 14, 12);
    }
    
    h4.text-dark {
        border-bottom: 2px solid rgb(12, 14, 12);
        padding-bottom: 5px;
    }
</style>

<?php include '../includes/footer.php'; ?>