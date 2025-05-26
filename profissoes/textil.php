<?php
session_start();
require __DIR__ . '/../config/config.php';
include '../includes/header.php';
$titulo = "Têxtil, Moda e Vestuário";
?>

<div class="container">


    <div class="row">
        <!-- Conteúdo Educacional -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h3><i class="fas fa-book-open me-2"></i>Fundamentos da Indústria Têxtil</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="text-success"><i class="fas fa-cut me-2"></i>O Que É a Indústria Têxtil?</h4>
                        <p>A indústria têxtil engloba todo o processo de criação, produção e comercialização de tecidos e artigos de vestuário. Ela se divide em três grandes áreas:</p>
                        <ol>
                            <li><strong>Fiação:</strong> Transformação de fibras em fios</li>
                            <li><strong>Tecelagem/Malharia:</strong> Transformação de fios em tecidos</li>
                            <li><strong>Confecção:</strong> Transformação de tecidos em produtos acabados</li>
                        </ol>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-success"><i class="fas fa-th-large me-2"></i>Tipos de Tecidos</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5>Tecidos Planos</h5>
                                    <p>Produzidos por tecelagem (entrelaçamento de fios), como:</p>
                                    <ul>
                                        <li>Popeline</li>
                                        <li>Sarja</li>
                                        <li>Cetim</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded mb-3 bg-light">
                                    <h5>Tecidos de Malha</h5>
                                    <p>Produzidos por malharia (formação de laçadas), como:</p>
                                    <ul>
                                        <li>Jersey</li>
                                        <li>Ribana</li>
                                        <li>Interlock</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-success"><i class="fas fa-leaf me-2"></i>Fibras Têxteis</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Origem</th>
                                        <th>Exemplos</th>
                                        <th>Características</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Naturais</td>
                                        <td>Vegetal/Animal</td>
                                        <td>Algodão, Linho, Lã, Seda</td>
                                        <td>Confortáveis, biodegradáveis</td>
                                    </tr>
                                    <tr>
                                        <td>Artificiais</td>
                                        <td>Celulósica</td>
                                        <td>Viscose, Modal, Lyocell</td>
                                        <td>Macias, boa absorção</td>
                                    </tr>
                                    <tr>
                                        <td>Sintéticas</td>
                                        <td>Petroquímica</td>
                                        <td>Poliéster, Nylon, Elastano</td>
                                        <td>Resistentes, fáceis de cuidar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-success"><i class="fas fa-cogs me-2"></i>Processos Têxteis</h4>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card h-100 border-success">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">1. Fiação</h5>
                                        <p class="card-text">Transformação de fibras em fios através de processos como cardagem, penteagem e filatura.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-success">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">2. Tecelagem/Malharia</h5>
                                        <p class="card-text">Transformação de fios em tecidos, seja por entrelaçamento (tecelagem) ou formação de laçadas (malharia).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-success">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">3. Acabamento</h5>
                                        <p class="card-text">Processos como branqueamento, tingimento, estamparia e mercerização para melhorar características.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-success"><i class="fas fa-ruler-combined me-2"></i>Design de Moda</h4>
                        <p>O processo de criação na moda envolve:</p>
                        <div class="process-steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <strong>Pesquisa de Tendências</strong>: Análise de mercado e comportamento
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <strong>Desenvolvimento de Coleção</strong>: Criação de conceitos e temas
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <strong>Desenho Técnico</strong>: Representação precisa das peças
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <strong>Prototipagem</strong>: Criação de modelos para ajustes
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
            <div class="card shadow mb-4 border-success">
                <div class="card-header bg-success text-white">
                    <h4><i class="fas fa-clipboard-check me-2"></i> Teste Seu Conhecimento</h4>
                </div>
                <div class="card-body text-center">
                    <img src="../assets/images/treinamento.png" class="img-fluid rounded mb-3" alt="Quiz de Têxtil">
                    <p>Agora que você aprendeu os conceitos básicos, teste seu conhecimento com nosso questionário de 10 perguntas!</p>
                    <div class="d-grid gap-2">
                        <a href="../questionarios/textil_quiz.php" class="btn btn-success btn-lg">
                            <i class="fas fa-play me-2"></i> Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recursos Adicionais -->
            <div class="card shadow border-success">
                <div class="card-header bg-success text-white">
                    <h4><i class="fas fa-bookmark me-2"></i> Recursos Adicionais</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-success"><i class="fas fa-video me-2"></i> Vídeo: Processo de Fiação</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-success"><i class="fas fa-image me-2"></i> Galeria: Tipos de Tecidos</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-success"><i class="fas fa-file-pdf me-2"></i> Glossário Têxtil</a>
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
        background-color: #28a745;
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
        background-color: #28a745;
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
        border-left: 3px solid #28a745;
    }
    
    h4.text-success {
        border-bottom: 2px solid #28a745;
        padding-bottom: 5px;
    }
</style>

<?php include '../includes/footer.php'; ?>