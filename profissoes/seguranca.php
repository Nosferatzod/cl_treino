<?php
session_start();
require __DIR__ . '/../config/config.php';
include '../includes/header.php';
$titulo = "Segurança do Trabalho";
?>

<div class="container">


    <div class="row">
        <!-- Conteúdo Educacional -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-danger text-white">
                    <h3><i class="fas fa-book-open me-2"></i>Fundamentos da Segurança do Trabalho</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="text-danger"><i class="fas fa-network-wired me-2"></i>O Que É Segurança do Trabalho</h4>
                        <p>Segurança do Trabalho é um conjunto de medidas e práticas adotadas para proteger a integridade física e a saúde dos trabalhadores durante o exercício de suas atividades profissionais.</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5 class="text-danger">Pontos Importantes</h5>
                                    <ul>
                                        <li>Prevenção de Acidentes e Doenças</li>
                                        <li>Cumprimento das Normas Regulamentadoras</li>
                                        <li>Uso de Equipamentos de Proteção Individual (EPI) e Coletiva (EPC)</li>
                                        <li>Educação e Conscientização dos Trabalhadores</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5 class="text-danger">Objetivos</h5>
                                    <ul>
                                        <li>Prevenção de acidentes</li>
                                        <li>Mapeamento de riscos</li>
                                        <li>Treinamentos e capacitações</li>
                                        <li>Melhoria da produtividade</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                    <div class="mb-4">
                        <h4 class="text-danger"><i class="fas fa-warehouse me-2"></i>Medidas de Proteção</h4>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card h-100 border-danger">
                                    <div class="card-body">
                                        <h5 class="card-title text-danger">NRs (Normas Regulamentadoras)</h5>
                                        <p class="card-text">Conjunto de regras estabelecidas pelo Ministério do Trabalho para garantir a segurança e saúde no ambiente de trabalho.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-danger">
                                    <div class="card-body">
                                        <h5 class="card-title text-danger">EPCs (Equipamentos de Proteção Coletiva)</h5>
                                        <p class="card-text">Dispositivos ou medidas utilizadas para proteger todos os trabalhadores de riscos no ambiente de trabalho.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-danger">
                                    <div class="card-body">
                                        <h5 class="card-title text-danger">EPIs (Equipamentos de Proteção Individual)</h5>
                                        <p class="card-text">Equipamentos fornecidos aos trabalhadores para proteção contra riscos específicos, como capacetes, luvas e óculos de segurança.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-danger">
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Vantagens</th>
                                        <th>Aplicações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NRs (Normas Regulamentadoras)</td>
                                        <td>Prevenção de acidentes</td>
                                        <td>Normas que ajudam a evitar acidentes</td>
                                    </tr>
                                    <tr>
                                        <td>EPCs (Equipamentos de Proteção Coletiva)</td>
                                        <td>Proteção coletiva</td>
                                        <td>proteger um grupo coletivo</td>
                                    </tr>
                                    <tr>
                                        <td>EPIs (Equipamentos de Proteção Individual)</td>
                                        <td>Proteção individual</td>
                                        <td>contato com produtos químicos</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-danger"><i class="fas fa-boxes me-2"></i>Tecnologias para Segurança do Trabalho</h4>
                        <div class="process-steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <strong>Sensores e IoTS</strong>: Sensores conectados via IoT monitoram condições ambientais
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <strong>Drones</strong>: Drones são usados para inspecionar locais perigosos
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <strong>SGS</strong>: Sistemas digitais ajudam na gestão de incidentes, riscos e treinamentos
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <strong>Tecnologia Vestível</strong>:  Capacetes inteligentes, coletes com sensores de movimento, óculos com AR
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
            <div class="card shadow mb-4 border-danger">
                <div class="card-header bg-danger text-white">
                    <h4><i class="fas fa-clipboard-check me-2"></i> Teste Seu Conhecimento</h4>
                </div>
                <div class="card-body text-center">
                    <img src="../assets/images/treinamento.png" class="img-fluid rounded mb-3" alt="Quiz de Segurança do Trabalho">
                    <p>Avalie seu entendimento sobre Segurança do Trabalho com nosso questionário de 10 perguntas!</p>
                    <div class="d-grid gap-2">
                        <a href="../questionarios/seguranca_quiz.php" class="btn btn-danger btn-lg">
                            <i class="fas fa-play me-2"></i> Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recursos Adicionais -->
            <div class="card shadow border-danger">
                <div class="card-header bg-danger text-white">
                    <h4><i class="fas fa-bookmark me-2"></i> Recursos Adicionais</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-danger"><i class="fas fa-video me-2"></i>Documentario: Acidentes no trabalho </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-danger"><i class="fas fa-chart-line me-2"></i>Direitos do Trabalhador</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-danger"><i class="fas fa-file-pdf me-2"></i> Guia de Normas Regulamentadoras</a>
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
        background-color: #dc3545;
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
        background-color: #dc3545;
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
        border-left: 3px solid #dc3545;
    }
    
    h4.text-danger {
        border-bottom: 2px solid #dc3545;
        padding-bottom: 5px;
    }
    
    .card.border-danger {
        border-top: 3px solid #dc3545 !important;
    }
</style>

<?php include '../includes/footer.php'; ?>
