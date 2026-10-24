<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras | GreenSmiley</title>
    <meta name="description" content="Revise os itens no seu carrinho de compras GreenSmiley e finalize seu pedido.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
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
                        <li class="nav-item"><a class="nav-link" href="/login">Entrar</a></li>
                        <li class="nav-item">
                            <a class="btn btn-success btn-sm ms-lg-2" href="/cadastro">Cadastre-se</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link position-relative ms-lg-3" href="/carrinho">
                            <i class="bi bi-cart3 fs-5"></i>
                            <?php if ($count > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                    <?= (int) $count ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
            </ol>
        </nav>

        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-<?= htmlspecialchars($_SESSION['flash']['type']) ?> alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['flash']['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <h1 class="h3 fw-bold text-dark mb-4">
            <i class="bi bi-cart3 text-success me-2"></i>Meu Carrinho
            <span class="badge bg-success fs-6 align-middle ms-2"><?= (int) $count ?> <?= $count === 1 ? 'item' : 'itens' ?></span>
        </h1>

        <?php if (empty($items)): ?>

            <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
                <i class="bi bi-cart-x display-1 text-muted mb-3"></i>
                <h2 class="h4 fw-bold text-dark mb-2">Seu carrinho está vazio</h2>
                <p class="text-muted mb-4">Explore nosso catálogo e adicione seus produtos favoritos.</p>
                <a href="/" class="btn btn-success btn-lg mx-auto" style="max-width: 300px;">
                    <i class="bi bi-shop me-2"></i>Ver Catálogo
                </a>
            </div>

        <?php else: ?>

            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Produto</th>
                                        <th class="text-center">Tamanho</th>
                                        <th class="text-end">Preço</th>
                                        <th class="text-center pe-4">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                        <tr>
                                            <td class="ps-4">
                                                <span class="fw-semibold text-dark"><?= htmlspecialchars($item['produto']) ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-dark px-3 py-2"><?= htmlspecialchars($item['tamanho']) ?></span>
                                            </td>
                                            <td class="text-end fw-bold text-success">
                                                R$ <?= number_format((float) $item['preco'], 2, ',', '.') ?>
                                            </td>
                                            <td class="text-center pe-4">
                                                <form action="/carrinho/remover" method="POST" class="d-inline">
                                                    <input type="hidden" name="item_id" value="<?= (int) $item['id'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Remover item">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Continuar Comprando
                        </a>
                        <form action="/carrinho/limpar" method="POST">
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-x-circle me-1"></i>Esvaziar Carrinho
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                        <h2 class="h5 fw-bold text-dark mb-3">Resumo do Pedido</h2>

                        <div class="d-flex justify-content-between text-muted mb-2">
                            <span>Subtotal (<?= (int) $count ?> <?= $count === 1 ? 'item' : 'itens' ?>)</span>
                            <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between text-muted mb-3">
                            <span>Frete</span>
                            <span class="text-success fw-semibold">Grátis</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">
                            <span class="h5 fw-bold text-dark mb-0">Total</span>
                            <span class="h5 fw-bold text-success mb-0">R$ <?= number_format($total, 2, ',', '.') ?></span>
                        </div>

                        <div class="d-grid">
                            <a href="/carrinho/checkout" class="btn btn-success btn-lg fw-semibold py-3">
                                <i class="bi bi-lock-fill me-2"></i>Finalizar Compra
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-shield-check text-success me-1"></i>Pagamento 100% seguro
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
