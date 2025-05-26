</main>
<style>
    html, body {
        height: 100%;
    }
    
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* viewport height */
    }
    
    main {
        flex: 1 0 auto; /* Ocupa todo o espaço disponível */
        padding-bottom: 60px; /* Espaço extra se necessário */
    }
    
    footer {
        flex-shrink: 0; /* Impede que o footer diminua */
    }
</style>
<footer class="bg-dark text-white py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Facilite seu aprendizado com CLTreino</h5>
                <p>"Como Se Preparar para o Mercado de Trabalho".</p>
            </div>
            <div class="col-md-4">
                <h5>Redes Sociais</h5>
                <ul class="list-unstyled">
                    <li><i class="fab fa-github me-2"></i><a href="https://github.com/Nosferatzod" class="text-white text-decoration-none">GitHub</a></li>
                    <li><i class="fab fa-instagram me-2"></i><a href="#" class="text-white text-decoration-none">Instagram</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contato</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-envelope me-2"></i> kauafrancino@gmail.com</li>
                    <li><i class="fas fa-phone me-2"></i> (79) 99660-3824</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; <?= date('Y'); ?> CLTreino. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>