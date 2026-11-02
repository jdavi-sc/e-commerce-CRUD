<?php
$searchQuery = trim($_GET['q'] ?? '');
if (!empty($searchQuery)) {
    $products = array_filter($products, function($p) use ($searchQuery) {
        return stripos($p['nome_produto'], $searchQuery) !== false 
            || stripos($p['nome_categoria'], $searchQuery) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSmiley | Official Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="/assets/css/greensmiley.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body>

    <?php include __DIR__ . '/../layouts/Cabecalho.php'; ?>

    <div class="container-fluid px-0">
        <div class="row g-0">
            <aside class="col-lg-2 d-none d-lg-block gs-sidebar">
                <div class="gs-sidebar-logo-box">
                    <a href="/">
                        <img src="/assets/img/logo.png" alt="GreenSmiley" class="gs-sidebar-logo">
                    </a>
                </div>

                <nav class="gs-sidebar-nav">
                    <a href="/" class="active">NEW</a>
                    <a href="/#catalogo">CLASSICS</a>
                    <a href="/#catalogo">COMBOS</a>
                    <a href="/#catalogo">T-SHIRTS</a>
                    <a href="/#catalogo">TOPS / JERSEYS</a>
                    <a href="/#catalogo">SWEATSHIRTS</a>
                    <a href="/#catalogo">JACKETS</a>
                    <a href="/#catalogo">KNITWEAR</a>
                    <a href="/#catalogo">BOTTOMS</a>
                    <a href="/#catalogo">SHORTS</a>
                    <a href="/#catalogo">DENIM</a>
                </nav>

                <div class="gs-sidebar-footer">
                    <div class="gs-sidebar-social">
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                    <nav class="gs-sidebar-links">
                        <a href="#">ARCHIVE</a>
                        <a href="#">NEWSLETTER</a>
                        <a href="#">SHIPPING POLICY</a>
                        <a href="#">TERMS OF SERVICE</a>
                    </nav>
                </div>
            </aside>

            <main id="catalogo" class="col-12 col-lg-10 gs-catalog-main">
                
                <?php if (isset($_SESSION['flash'])): ?>
                    <div class="container-fluid px-3 mb-3">
                        <div class="gs-alert gs-alert-<?= htmlspecialchars($_SESSION['flash']['type']) ?>">
                            <?= htmlspecialchars($_SESSION['flash']['message']) ?>
                        </div>
                    </div>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>

                <?php if (!empty($searchQuery)): ?>
                    <div class="container-fluid px-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-white small">RESULTADOS PARA: "<?= htmlspecialchars($searchQuery) ?>"</span>
                            <a href="/" class="gs-btn gs-btn-outline py-1 px-2 small">LIMPAR BUSCA</a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (empty($products)): ?>
                    <div class="text-center py-5">
                        <p class="text-white mb-3">NENHUM PRODUTO ENCONTRADO.</p>
                        <a href="/" class="gs-btn gs-btn-outline">VER TODOS OS PRODUTOS</a>
                    </div>
                <?php else: ?>
                    <div class="row g-2 g-md-4 px-2 px-md-3">
                        <?php foreach ($products as $produto): ?>
                            <?php 
                                $imgFile = "/assets/img/img{$produto['id']}.png";
                            ?>
                            <div class="col-6 col-md-4 col-xl-4">
                                <a href="/produto?id=<?= (int) $produto['id'] ?>" class="gs-product-card">
                                    <div class="gs-product-img-wrap">
                                        <img src="<?= htmlspecialchars($imgFile) ?>" 
                                             class="gs-product-img" 
                                             alt="<?= htmlspecialchars($produto['nome_produto']) ?>"
                                             loading="lazy"
                                             onerror="this.src='/assets/img/logo.png'">
                                    </div>
                                    <div class="gs-product-info">
                                        <h2 class="gs-product-name">
                                            <?= htmlspecialchars(strtoupper($produto['nome_produto'])) ?>
                                            [<?= htmlspecialchars(strtoupper($produto['nome_categoria'])) ?>]
                                        </h2>
                                        <span class="gs-product-price">
                                            R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
