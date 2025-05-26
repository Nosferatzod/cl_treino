<?php
session_start();
require __DIR__ . '/../config/config.php';
include '../includes/header.php';
$titulo = "Logística e Cadeia de Suprimentos";
?>

<div class="container">


    <div class="row">
        <!-- Conteúdo Educacional -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h3><i class="fas fa-book-open me-2"></i>Fundamentos da Logística</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="text-primary"><i class="fas fa-network-wired me-2"></i>O Que É Logística?</h4>
                        <p>Logística é o processo de planejamento, implementação e controle do fluxo eficiente de materiais, informações e recursos financeiros desde o ponto de origem até o ponto de consumo.</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5 class="text-primary">Principais Componentes</h5>
                                    <ul>
                                        <li>Transporte</li>
                                        <li>Armazenagem</li>
                                        <li>Gestão de estoques</li>
                                        <li>Processamento de pedidos</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5 class="text-primary">Objetivos</h5>
                                    <ul>
                                        <li>Redução de custos</li>
                                        <li>Melhoria no serviço ao cliente</li>
                                        <li>Otimização de recursos</li>
                                        <li>Agilidade nos processos</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-primary"><i class="fas fa-route me-2"></i>Modalidades de Transporte</h4>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Rodoviário</h5>
                                        <p class="card-text">Mais flexível, ideal para curtas e médias distâncias. Representa 60% do transporte no Brasil.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Ferroviário</h5>
                                        <p class="card-text">Econômico para grandes volumes e longas distâncias. Baixa emissão de poluentes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Aéreo</h5>
                                        <p class="card-text">Mais rápido, porém mais caro. Ideal para produtos de alto valor ou perecíveis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Aquaviário</h5>
                                        <p class="card-text">Mais econômico para grandes volumes internacionais. Lento porém de alta capacidade.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Dutoviário</h5>
                                        <p class="card-text">Especializado para líquidos e gases. Custo fixo alto mas operação econômica.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-primary"><i class="fas fa-warehouse me-2"></i>Gestão de Armazenagem</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Vantagens</th>
                                        <th>Aplicações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CD - Centro de Distribuição</td>
                                        <td>Agilidade, redução de custos</td>
                                        <td>Varejo, e-commerce</td>
                                    </tr>
                                    <tr>
                                        <td>Armazém Geral</td>
                                        <td>Flexibilidade, custo acessível</td>
                                        <td>Estocagem de longo prazo</td>
                                    </tr>
                                    <tr>
                                        <td>Cross-Docking</td>
                                        <td>Sem estocagem, rápido turnover</td>
                                        <td>Produtos perecíveis</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-primary"><i class="fas fa-boxes me-2"></i>Tecnologias Logísticas</h4>
                        <div class="process-steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <strong>Sistemas WMS</strong>: Warehouse Management Systems para gestão de armazéns
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <strong>TMS</strong>: Transportation Management Systems para otimização de rotas
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <strong>RFID</strong>: Identificação por radiofrequência para rastreamento
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <strong>IoT</strong>: Internet das Coisas para monitoramento em tempo real
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
            <div class="card shadow mb-4 border-primary">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-clipboard-check me-2"></i> Teste Seu Conhecimento</h4>
                </div>
                <div class="card-body text-center">
                    <img src="../assets/images/treinamento.png" class="img-fluid rounded mb-3" alt="Quiz de Logística">
                    <p>Avalie seu entendimento sobre logística com nosso questionário de 10 perguntas!</p>
                    <div class="d-grid gap-2">
                        <a href="../questionarios/logistica_quiz.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-play me-2"></i> Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recursos Adicionais -->
            <div class="card shadow border-primary">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-bookmark me-2"></i> Recursos Adicionais</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-primary"><i class="fas fa-video me-2"></i> Tour Virtual: Centro de Distribuição</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-primary"><i class="fas fa-chart-line me-2"></i> Infográfico: Rotas Logísticas</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-primary"><i class="fas fa-file-pdf me-2"></i> Guia de Termos Logísticos</a>
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
        background-color: #0d6efd;
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
        background-color: #0d6efd;
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
        border-left: 3px solid #0d6efd;
    }
    
    h4.text-primary {
        border-bottom: 2px solid #0d6efd;
        padding-bottom: 5px;
    }
    
    .card.border-primary {
        border-top: 3px solid #0d6efd !important;
    }
</style>

<?php include '../includes/footer.php'; ?>