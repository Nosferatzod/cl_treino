<?php
require __DIR__ . '/config/config.php';
session_start();

$titulo = "Contato"; // Define o título da página
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        .contact-section {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .contact-info {
            background-color: #0073bc;
            color: white;
            border-radius: 10px;
            padding: 25px;
            height: 100%;
        }

        .contact-info i {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #a4d1eb;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #6c8898;
            padding: 10px 15px;
        }

        .btn-contact {
            background-color: #0073bc;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-contact:hover {
            background-color: #005a99;
            transform: translateY(-2px);
        }

        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    
    <main class="container mt-4">
        <!-- Cabeçalho -->
        <section class="mb-5 text-center">
            <h1 class="fw-bold mb-3">Entre em Contato</h1>
            <p class="lead">Tem dúvidas, sugestões ou precisa de suporte? Nossa equipe está pronta para ajudar.</p>
        </section>

        <div class="row g-4">
            <!-- Formulário de Contato -->
            <div class="col-lg-7">
                <div class="contact-section">
                    <h3 class="mb-4 fw-bold">Envie-nos uma mensagem</h3>
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="assunto" class="form-label">Assunto</label>
                                    <input type="text" class="form-control" id="assunto" name="assunto" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mensagem" class="form-label">Mensagem</label>
                                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-contact">
                                    <i class="fas fa-paper-plane me-2"></i> Enviar Mensagem
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informações de Contato -->
            <div class="col-lg-5">
                <div class="contact-info">
                    <h3 class="mb-4 fw-bold">Informações de Contato</h3>
                    
                    <div class="mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                        <h5>Endereço</h5>
                        <p>Rua Industrial, 1234<br>Bairro Tecnológico<br>São Paulo - SP</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-phone-alt"></i>
                        <h5>Telefone</h5>
                        <p>(11) 1234-5678<br>(11) 98765-4321</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-envelope"></i>
                        <h5>E-mail</h5>
                        <p>contato@cltreino.com.br<br>suporte@cltreino.com.br</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-clock"></i>
                        <h5>Horário de Atendimento</h5>
                        <p>Segunda a Sexta: 8h às 18h<br>Sábado: 9h às 13h</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <section class="mt-5">
            <h3 class="text-center mb-4 fw-bold">Onde nos encontrar</h3>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.0754267452926!2d-46.65342658502219!3d-23.565734367638642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1629839206842!5m2!1spt-BR!2sbr" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                </iframe>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>