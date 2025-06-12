<?php
require __DIR__ . '/config/config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        LI{
            COLOR:#0073bc;
        }
        
        body{
            color: white;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('assets/images/banner01.png') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 8rem 0;
            margin-bottom: 3rem;
        }

        .feature-card {
            color: white;
            background-color: black;
            transition: transform 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Hero Banner  paleta: azul acinzentado:#6c8898 / azul claro:#a4d1eb / azul escuro:#0073bc / preto puro e branco puro-->
    <section id="banner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#banner" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#banner" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/banner01.png" class="d-block w-100" alt="Design de Veículos">
                <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInDown">
                 </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/banner02.png" class="d-block w-100" alt="Fabricação de Veículos">
                <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInDown">
                 </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/banner03.png" class="d-block w-100" alt="Controle de Qualidade">
                <div class="carousel-caption d-none d-md-block animate__animated animate__fadeInDown">
            </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </section>

    <!-- Sobre -->
    <section class="container mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">O que oferecemos?</h2>
                <p class="lead">
                    O CLTreino é uma plataforma de ensino acelerado desenvolvida para profissionais
                    que desejam se qualificar rapidamente nas principais áreas industriais.
                </p>
                <ul class="list-unstyled">
                    <li class="mb-2 text-white"><i class="fas fa-check-circle me-2"></i> Cursos objetivos e práticos</li>
                    <li class="mb-2 text-white"><i class="fas fa-check-circle me-2"></i> Avaliações com feedback imediato</li>
                    <li class="mb-2 text-white"><i class="fas fa-check-circle me-2"></i> Certificação digital</li>
                    <li class="mb-2 text-white"><i class="fas fa-check-circle me-2"></i> Acompanhamento de progresso</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="assets/svg/logo2.svg" alt="logo" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Áreas de Atuação -->
    <section class="py-5 ">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Nossas Áreas de Especialização</h2>
            <div class="row g-4">
                <!-- Card Logística -->
                <div class="col-md-6 col-lg-3">
                    <div class="card feature-card h-100">
                        <img src="./assets/images/logistica02.jpg" class="card-img-top" alt="Logística">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Logística</h5>
                            <p class="card-text">Domine a gestão de cadeia de suprimentos e otimize processos de distribuição.</p>
                        </div>
                        <div class="card-footer border-0">
                            <a href="profissoes/logistica.php" class="btn btn-primary w-100">Explorar</a>
                        </div>
                    </div>
                </div>

                <!-- Card Têxtil -->
                <div class="col-md-6 col-lg-3">
                    <div class="card feature-card h-100">
                        <img src="assets/images/moda.webp" class="card-img-top" alt="Têxtil">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Têxtil, Moda e Vestuário</h5>
                            <p class="card-text">Aprenda técnicas modernas de produção têxtil e desenvolvimento de produtos.</p>
                        </div>
                        <div class="card-footer border-0">
                            <a href="profissoes/textil.php" class="btn btn-success w-100">Explorar</a>
                        </div>
                    </div>
                </div>

                <!-- Card Segurança -->
                <div class="col-md-6 col-lg-3">
                    <div class="card feature-card h-100">
                        <img src="assets/images/seguranca.jpg" class="card-img-top" alt="Segurança">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Segurança do Trabalho</h5>
                            <p class="card-text">Conheça as normas e procedimentos essenciais para um ambiente seguro.</p>
                        </div>
                        <div class="card-footer border-0">
                            <a href="profissoes/seguranca.php" class="btn btn-danger w-100">Explorar</a>
                        </div>
                    </div>
                </div>

                <!-- Card Eletrônica -->
                <div class="col-md-6 col-lg-3">
                    <div class="card feature-card h-100">
                        <img src="assets/images/eletronica03.jpg" class="card-img-top" alt="Eletrônica">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Eletrônica e Automação</h5>
                            <p class="card-text">Domine circuitos eletrônicos e princípios de automação industrial.</p>
                        </div>
                        <div class="card-footer border-0">
                            <a href="profissoes/eletronica.php" class="btn btn-dark w-100">Explorar</a>
                        </div>
                    </div>
                </div>
                       <section class="py-12">
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold mb-6 text-teal-500">Nossa Localização</h2>
                <div class="bg-blue rounded-lg shadow-md overflow-hidden">
                    <iframe allowfullscreen="" height="450" loading="lazy"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153167!3d-37.81627917975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d1f9f1b1e0e!2sGoogle!5e0!3m2!1sen!2sus!4v1633022931234!5m2!1sen!2sus"
                        style="border:0;" width="100%" height="450"></iframe>
                </div>
            </div>
        </section>
            <!-- Acesso Premium -->
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4 text-warning">Acesso Premium</h2>
            <p class="lead">Desbloqueie conteúdos exclusivos e avançados para acelerar ainda mais sua carreira profissional.</p>
            <ul class="list-unstyled mb-4">
                <li class="text-white"><i class="fas fa-star me-2 text-warning"></i> Cursos exclusivos para assinantes</li>
                <li class="text-white"><i class="fas fa-star me-2 text-warning"></i> Conteúdos atualizados mensalmente</li>
                <li class="text-white"><i class="fas fa-star me-2 text-warning"></i> Suporte direto com especialistas</li>
                <li class="text-white"><i class="fas fa-star me-2 text-warning"></i> Certificados premium reconhecidos</li>
            </ul>
            <a href="premium.php" class="btn btn-warning btn-lg">Quero ser Premium</a>
        </div>
    </section>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>