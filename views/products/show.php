<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['nome_produto']) ?> | GreenSmiley</title>
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
                    <a href="/">NEW</a>
                    <a href="/#catalogo" class="active">CLASSICS</a>
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
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                    </div>
                    <nav class="gs-sidebar-links">
                        <a href="#">ARCHIVE</a>
                        <a href="#">NEWSLETTER</a>
                        <a href="#">SHIPPING POLICY</a>
                        <a href="#">TERMS OF SERVICE</a>
                    </nav>
                </div>
            </aside>

            <main class="col-12 col-lg-10 gs-detail-container">
                <div class="row g-4 align-items-start">
                    
                    <div class="col-12 col-md-7 col-xl-7">
                        <div class="gs-detail-img-wrap">
                            <button type="button" class="gs-detail-img-nav gs-prev" onclick="history.back()" aria-label="Voltar">
                                <i class="bi bi-chevron-left"></i>
                            </button>

                            <?php 
                                $imgFile = "/assets/img/img{$product['id']}.png"; 
                            ?>
                            <img src="<?= htmlspecialchars($imgFile) ?>" 
                                 class="gs-detail-img" 
                                 id="mainProductImage"
                                 alt="<?= htmlspecialchars($product['nome_produto']) ?>"
                                 onerror="this.src='/assets/img/logo.png'">

                            <button type="button" class="gs-detail-img-nav gs-next" aria-label="Próxima imagem">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 col-xl-5">
                        <div class="gs-detail-info">
                            
                            <h1 class="gs-detail-title">
                                <?= htmlspecialchars(strtoupper($product['nome_produto'])) ?> 
                                [<?= htmlspecialchars(strtoupper($product['nome_categoria'])) ?>]
                            </h1>

                            <div class="gs-detail-price">
                                R$ <?= number_format((float) $product['preco'], 2, ',', '.') ?>
                            </div>

                            <form action="/carrinho/adicionar" method="POST" id="productForm">
                                <input type="hidden" name="produto_id" value="<?= (int) $product['id'] ?>">
                                <input type="hidden" name="nomeProduto" value="<?= htmlspecialchars($product['nome_produto']) ?>">
                                <input type="hidden" name="precoProduto" value="<?= htmlspecialchars((string) $product['preco']) ?>">

                                <div class="gs-size-section">
                                    <span class="gs-section-label">SIZE</span>

                                    <?php if (empty($product['tamanhos'])): ?>
                                        <div class="text-danger small fw-bold mb-2">ESGOTADO NO MOMENTO</div>
                                    <?php else: ?>
                                        <div class="gs-size-grid">
                                            <?php foreach ($product['tamanhos'] as $index => $tamanho): ?>
                                                <input type="radio" 
                                                       class="btn-check" 
                                                       name="Tamanhos" 
                                                       id="tam_<?= (int) $tamanho['id_tamanho'] ?>" 
                                                       value="<?= htmlspecialchars($tamanho['tamanho']) ?>" 
                                                       <?= $index === 0 ? 'checked' : '' ?> required>
                                                <label class="gs-size-btn-label" for="tam_<?= (int) $tamanho['id_tamanho'] ?>">
                                                    <?= htmlspecialchars($tamanho['tamanho']) ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-4">
                                    <span class="gs-section-label">COLOUR</span>
                                    <div class="gs-color-grid">
                                        <div class="gs-color-thumb active" title="Cor Principal">
                                            <img src="<?= htmlspecialchars($imgFile) ?>" alt="Cor Principal">
                                        </div>
                                    </div>
                                </div>

                                <?php if (empty($product['tamanhos'])): ?>
                                    <button type="button" class="gs-btn-action sold-out" disabled>
                                        SOLD OUT
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="gs-btn-action">
                                        ADD TO CART
                                    </button>
                                <?php endif; ?>
                            </form>

                            <div class="gs-accordion-wrap">
                                <div class="gs-accordion-item">
                                    <button type="button" class="gs-accordion-header" onclick="toggleGsAccordion(this)">
                                        <span>DETAILS</span>
                                        <i class="bi bi-chevron-right gs-accordion-arrow"></i>
                                    </button>
                                    <div class="gs-accordion-body" style="display: none;">
                                        <ul>
                                            <li>Modelagem e corte exclusivo Streetwear Oversized</li>
                                            <li>Algodão premium 100% penteado com toque macio</li>
                                            <li>Costura reforçada de ombro a ombro</li>
                                            <li>Estampa silk-screen de alta durabilidade</li>
                                            <li>Autenticidade oficial GreenSmiley</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="gs-accordion-item">
                                    <button type="button" class="gs-accordion-header" onclick="toggleGsAccordion(this)">
                                        <span>SIZE GUIDE</span>
                                        <i class="bi bi-chevron-right gs-accordion-arrow"></i>
                                    </button>
                                    <div class="gs-accordion-body" style="display: none;">
                                        <p>Modelagem regular com caimento solto. Recomendamos comprar o tamanho que você normalmente usa para um visual casual streetwear, ou um tamanho acima para estilo baggy.</p>
                                    </div>
                                </div>

                                <div class="gs-accordion-item">
                                    <button type="button" class="gs-accordion-header" onclick="toggleGsAccordion(this)">
                                        <span>SHIPPING POLICY</span>
                                        <i class="bi bi-chevron-right gs-accordion-arrow"></i>
                                    </button>
                                    <div class="gs-accordion-body" style="display: none;">
                                        <p>Envio para todo o Brasil com rastreamento.</p>
                                        <p>Pedidos processados e despachados em até 48 horas úteis. Em até 10x sem juros no cartão.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleGsAccordion(btn) {
            const item = btn.closest('.gs-accordion-item');
            const body = item.querySelector('.gs-accordion-body');
            const isOpen = item.classList.contains('open');

            if (isOpen) {
                item.classList.remove('open');
                body.style.display = 'none';
            } else {
                item.classList.add('open');
                body.style.display = 'block';
            }
        }
    </script>
</body>
</html>
