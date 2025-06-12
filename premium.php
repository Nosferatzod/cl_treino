<?php
require __DIR__ . '/config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/header.php'; ?>
    <style>
        body {
            color: white;
        }

        .premium-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                url('assets/images/banner03.png') no-repeat center center;
            background-size: cover;
            padding: 6rem 0;
            text-align: center;
        }

        .premium-hero h1 {
            color: #f8c100;
            font-size: 3rem;
        }

        .premium-benefits {
            background-color: #121212;
            padding: 4rem 0;
        }

        .benefit-item {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .btn-premium {
            background-color: #f8c100;
            color: #000;
            font-weight: bold;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-premium:hover {
            background-color: #ffc400;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- Hero Premium -->
    <section class="premium-hero">
        <div class="container">
            <h1>Plano Premium CLTreino</h1>
            <p class="lead text-white mt-3">Desbloqueie o melhor da nossa plataforma e acelere sua carreira!</p>
            <a href="contato.php" class="btn btn-premium mt-4">Quero ser Premium</a>
        </div>
    </section>

    <!-- Benefícios do Premium -->
    <section class="premium-benefits text-center">
        <div class="container">
            <h2 class="text-warning mb-5">O que você ganha com o Premium?</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-play-circle fa-2x text-warning mb-3"></i>
                    <p>Cursos exclusivos e avançados nas áreas industriais</p>
                </div>
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-user-check fa-2x text-warning mb-3"></i>
                    <p>Acompanhamento individual com especialistas</p>
                </div>
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-certificate fa-2x text-warning mb-3"></i>
                    <p>Certificados reconhecidos</p>
                </div>
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-infinity fa-2x text-warning mb-3"></i>
                    <p>Acesso ilimitado a todo o conteúdo da plataforma</p>
                </div>
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-sync-alt fa-2x text-warning mb-3"></i>
                    <p>Novos cursos adicionados</p>
                </div>
                <div class="col-md-6 col-lg-4 benefit-item">
                    <i class="fas fa-headset fa-2x text-warning mb-3"></i>
                    <p>Suporte prioritário e exclusivo</p>
                </div>
            </div>

            <div class="mt-5">
                <a href="contato.php" class="btn btn-premium btn-lg">Assinar Agora</a>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>
