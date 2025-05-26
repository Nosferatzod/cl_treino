<?php
// Verifica se a constante BASE_URL está definida
defined('BASE_URL') or die('Configurações não carregadas!');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <!-- Logo/Marca -->
        <a class="navbar-brand" href="../index.php">
            <i class="fas fa-graduation-cap me-2"></i>CLTreino
        </a>

        <!-- Botão Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens do Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="fas fa-home me-1"></i> Inicio
                    </a>
                </li>

                <!-- Dropdown Profissões -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profissoesDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-briefcase me-1"></i> Profissões
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/profissoes/logistica.php">
                                <i class="fas fa-truck text-primary me-2"></i> Logística
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profissoes/textil.php">
                                <i class="fas fa-tshirt text-success me-2"></i> Têxtil e Moda
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profissoes/seguranca.php">
                                <i class="fas fa-hard-hat text-danger me-2"></i> Segurança
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profissoes/eletronica.php">
                                <i class="fas fa-microchip text-dark me-2"></i> Eletrônica
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Novo item de Contato -->
                <li class="nav-item">
                    <a class="nav-link" href="/contato.php">
                        <i class="fas fa-envelope me-1"></i> Contato
                    </a>
                </li>

            </ul>

            <!-- Menu do Usuário -->
            <div class="d-flex">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <div class="dropdown">
                        <a href="#" class="text-white dropdown-toggle d-flex align-items-center" id="userDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?= $_SESSION['usuario_nome'] ?? 'Usuário' ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/dashboard.php">
                                    <i class="fas fa-tachometer-alt me-2"></i> Perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/resultados.php">
                                    <i class="fas fa-chart-bar me-2"></i> Meus Resultados
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="/logout.php">
                                    <i class="fas fa-sign-out-alt me-2"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/login.php" class="btn btn-outline-light me-2">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                    <a href="/cadastro.php" class="btn btn-light">
                        <i class="fas fa-user-plus me-1"></i> Cadastre-se
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>