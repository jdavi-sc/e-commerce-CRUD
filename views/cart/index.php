<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | GreenSmiley</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="/assets/css/greensmiley.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body>

    <?php include __DIR__ . '/../layouts/Cabecalho.php'; ?>

    <div class="container py-4 py-md-5">

        <?php if (isset($_SESSION['flash'])): ?>
            <div class="gs-alert gs-alert-<?= htmlspecialchars($_SESSION['flash']['type']) ?>">
                <?= htmlspecialchars($_SESSION['flash']['message']) ?>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>

        <div class="gs-page-header d-flex justify-content-between align-items-center">
            <h1 class="gs-page-title mb-0">
                CART (<?= (int) $count ?>)
            </h1>
            <a href="/" class="gs-btn gs-btn-outline py-1 px-3 small">
                <i class="bi bi-arrow-left me-1"></i>CONTINUE SHOPPING
            </a>
        </div>

        <?php if (empty($items)): ?>

            <div class="text-center py-5 my-4">
                <i class="bi bi-cart-x fs-1 text-secondary mb-3 d-block"></i>
                <h2 class="fs-4 text-white mb-2">SEU CARRINHO ESTÁ VAZIO</h2>
                <p class="text-muted mb-4">Adicione itens exclusivos ao seu carrinho para continuar.</p>
                <a href="/" class="gs-btn gs-btn-primary">
                    EXPLORAR CATÁLOGO
                </a>
            </div>

        <?php else: ?>

            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <div class="table-responsive">
                        <table class="gs-table-dark">
                            <thead>
                                <tr>
                                    <th>ITEM</th>
                                    <th class="text-center">TAMANHO</th>
                                    <th class="text-end">PREÇO</th>
                                    <th class="text-center">REMOVER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td>
                                            <span class="gs-cart-item-name"><?= htmlspecialchars(strtoupper($item['produto'])) ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span class="border border-secondary px-2 py-1 small fw-bold text-white"><?= htmlspecialchars($item['tamanho']) ?></span>
                                        </td>
                                        <td class="text-end fw-bold">
                                            R$ <?= number_format((float) $item['preco'], 2, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="/carrinho/remover" method="POST" class="d-inline">
                                                <input type="hidden" name="item_id" value="<?= (int) $item['id'] ?>">
                                                <button type="submit" class="btn btn-link text-danger p-0" title="Remover item" aria-label="Remover">
                                                    <i class="bi bi-trash3 fs-6"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
                        <form action="/carrinho/limpar" method="POST">
                            <button type="submit" class="gs-btn gs-btn-danger-outline py-1 px-3 small">
                                LIMPAR CARRINHO
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="gs-cart-summary-box">
                        <h2 class="gs-cart-summary-title">ORDER SUMMARY</h2>

                        <div class="gs-summary-line">
                            <span class="text-muted">SUBTOTAL (<?= (int) $count ?> ITENS)</span>
                            <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                        </div>
                        <div class="gs-summary-line">
                            <span class="text-muted">ENVIO</span>
                            <span class="text-white">GRÁTIS</span>
                        </div>

                        <div class="gs-summary-line total">
                            <span>TOTAL</span>
                            <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                        </div>

                        <div class="mt-4">
                            <a href="/carrinho/checkout" class="gs-btn gs-btn-primary w-100 py-3">
                                PROCEED TO CHECKOUT
                            </a>
                        </div>

                        <div class="text-center mt-3 small text-muted">
                            <i class="bi bi-shield-lock me-1"></i>TRANSAÇÃO SEGURA E CRIPTOGRAFADA
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
