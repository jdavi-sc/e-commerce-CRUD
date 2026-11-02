<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | GreenSmiley</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Custom Theme CSS -->
    <link href="/assets/css/greensmiley.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body>

    <?php include __DIR__ . '/../layouts/Cabecalho.php'; ?>

    <div class="container py-5 my-md-4">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-7">
                <h1 class="gs-page-title mb-4">ABOUT US</h1>

                <div class="pe-lg-4" style="font-size: 0.95rem; line-height: 1.8;">
                    <p>
                        Nas ruas, a gente encontrou nossa voz.<br>
                        Na batida do asfalto, no spray das paredes, na liberdade de ser quem se é, nasceu a 
                        <span class="text-white fw-bold">GREENSMILEY.</span>
                    </p>
                        
                    <p>
                        Mais que roupas, a gente cria atitude. Cada peça é um manifesto de expressão.<br> 
                        Acreditamos que estilo é identidade, e identidade é pra ser mostrada, sem medo.
                    </p>

                    <p>
                        Somos feitos pra quem vive fora da caixa, pra quem transforma a rua em passarela e a vida em arte.<br> 
                        Do underground pro mainstream, carregamos a alma urbana em cada detalhe — nas estampas, nas cores, nos cortes, nas ideias.
                    </p>

                    <p class="mt-4 fw-bold text-white fs-5" style="letter-spacing: 0.15em;">
                        #STAYREAL #STAYSTREET #CRTW
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-5 text-center">
                <div class="p-4 border border-dark d-inline-block" style="background: radial-gradient(circle, rgba(32,194,14,0.1) 0%, rgba(0,0,0,0) 70%);">
                    <img src="/assets/img/logo.png" alt="GreenSmiley Logo" class="img-fluid" style="max-height: 200px; filter: drop-shadow(0 0 15px var(--gs-green-glow));">
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
