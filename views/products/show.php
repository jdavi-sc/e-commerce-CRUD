<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['nome_produto']) ?> | GreenSmiley</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <style>
        .product-detail-img {
            max-height: 440px;
            object-fit: contain;
            background-color: #f8f9fa;
        }
        .btn-check:checked + .btn-outline-dark {
            background-color: #198754;
            border-color: #198754;
            color: #fff;
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
                    <li class="nav-item"><a class="nav-link" href="/">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#catalogo">Catálogo</a></li>
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

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($product['nome_produto']) ?></li>
            </ol>
        </nav>

        <div class="row g-4 align-items-start">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-3 p-lg-4 text-center bg-white">
                    <?php $imgFile = "/assets/img/img{$product['id']}.png"; ?>
                    <img src="<?= htmlspecialchars($imgFile) ?>" 
                         class="img-fluid product-detail-img mx-auto rounded" 
                         alt="<?= htmlspecialchars($product['nome_produto']) ?>"
                         onerror="this.src='/assets/img/logo.png'">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <span class="badge bg-light text-success border border-success-subtle align-self-start mb-2 px-3 py-2">
                        <?= htmlspecialchars(strtoupper($product['nome_categoria'])) ?>
                    </span>

                    <h1 class="h3 fw-bold text-dark mb-2"><?= htmlspecialchars($product['nome_produto']) ?></h1>

                    <div class="mb-3">
                        <span class="h3 fw-bold text-success">
                            R$ <?= number_format((float) $product['preco'], 2, ',', '.') ?>
                        </span>
                        <span class="text-muted small d-block">Em até 10x sem juros no cartão</span>
                    </div>

                    <hr class="my-3">

                    <form action="/carrinho/adicionar" method="POST">
                        <input type="hidden" name="produto_id" value="<?= (int) $product['id'] ?>">
                        <input type="hidden" name="nomeProduto" value="<?= htmlspecialchars($product['nome_produto']) ?>">
                        <input type="hidden" name="precoProduto" value="<?= htmlspecialchars((string) $product['preco']) ?>">

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark mb-2">Tamanhos Disponíveis:</label>

                            <?php if (empty($product['tamanhos'])): ?>
                                <div class="alert alert-warning py-2 small mb-0">Produto temporariamente sem estoque.</div>
                            <?php else: ?>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php foreach ($product['tamanhos'] as $index => $tamanho): ?>
                                        <input type="radio" 
                                               class="btn-check" 
                                               name="Tamanhos" 
                                               id="tam_<?= (int) $tamanho['id_tamanho'] ?>" 
                                               value="<?= htmlspecialchars($tamanho['tamanho']) ?>" 
                                               <?= $index === 0 ? 'checked' : '' ?> required>
                                        <label class="btn btn-outline-dark px-3 py-2 rounded-3" for="tam_<?= (int) $tamanho['id_tamanho'] ?>">
                                            <span class="fw-bold"><?= htmlspecialchars($tamanho['tamanho']) ?></span>
                                            <small class="d-block text-muted" style="font-size: 0.7rem;">(<?= (int) $tamanho['estoque'] ?> un)</small>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" 
                                    class="btn btn-success btn-lg fw-semibold py-3" 
                                    <?= empty($product['tamanhos']) ? 'disabled' : '' ?>>
                                🛒 Adicionar ao Carrinho
                            </button>
                            <a href="/" class="btn btn-outline-secondary">Continuar Comprando</a>
                        </div>
                    </form>

                    <div class="border rounded-3 p-3 bg-light mt-3">
                        <h2 class="h6 fw-bold mb-2">Detalhes e Especificações</h2>
                        <ul class="small text-muted ps-3 mb-0">
                            <li>Modelagem e acabamento premium Streetwear</li>
                            <li>Tecido e costura reforçada de alta durabilidade</li>
                            <li>Garantia e autenticidade GreenSmiley</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
