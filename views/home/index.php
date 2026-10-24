<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSmiley | Loja Oficial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <style>
        .product-img {
            height: 220px;
            object-fit: contain;
            background-color: #f8f9fa;
        }
        .card-product {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-product:hover {
            transform: translateY(-4px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/assets/img/logo.png" alt="Logo" width="34" height="34" class="me-2 rounded-circle">
                <span class="fw-bold text-success">GreenSmiley</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="/">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#catalogo">Catálogo</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <span class="nav-link text-light">Olá, <?= htmlspecialchars($_SESSION['user']['nome']) ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger btn-sm ms-lg-2" href="/logout">Sair</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success btn-sm ms-lg-2" href="/cadastro">Cadastre-se</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">

        <div id="catalogo" class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 fw-bold text-dark mb-0">Catálogo de Produtos</h1>
                    <small class="text-muted">Produtos exclusivos GreenSmiley</small>
                </div>
                <span class="badge bg-dark fs-6"><?= count($products) ?> itens</span>
            </div>

            <div class="row g-4">
                <?php foreach ($products as $produto): ?>
                    <?php 
                        $imgFile = "/assets/img/img{$produto['id']}.png";
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card card-product h-100 border-0 shadow-sm overflow-hidden">
                            <img src="<?= htmlspecialchars($imgFile) ?>" 
                                 class="card-img-top product-img p-3" 
                                 alt="<?= htmlspecialchars($produto['nome_produto']) ?>"
                                 onerror="this.src='/assets/img/logo.png'">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <span class="badge bg-light text-success border border-success-subtle mb-2">
                                        <?= htmlspecialchars(strtoupper($produto['nome_categoria'])) ?>
                                    </span>
                                    <h2 class="h6 card-title fw-bold text-dark mb-2">
                                        <?= htmlspecialchars($produto['nome_produto']) ?>
                                    </h2>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="h5 mb-0 fw-bold text-success">
                                        R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                    </span>
                                    <a href="/produto?id=<?= (int) $produto['id'] ?>" class="btn btn-sm btn-outline-dark">
                                        Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>