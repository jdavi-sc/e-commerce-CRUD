<?php
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}
$cartCount = class_exists('\App\Models\Cart') ? \App\Models\Cart::count() : 0;
?>
<!-- Top Navbar -->
<nav class="navbar sticky-top gs-navbar">
    <div class="container-fluid px-2 px-md-4">
        <!-- Mobile: Hamburger Menu -->
        <button class="gs-hamburger d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#gsMobileMenu" aria-label="Abrir Menu">
            <i class="bi bi-list"></i>
        </button>

        <!-- Logo / Marca -->
        <a class="gs-brand-wrap mx-auto mx-lg-0" href="/">
            <img src="/assets/img/logo.png" alt="GreenSmiley" class="gs-logo" onerror="this.src='/assets/img/favicon.ico'">
        </a>

        <!-- Mobile: Ícone Carrinho -->
        <a href="/carrinho" class="gs-cart-icon-btn d-lg-none" aria-label="Carrinho de Compras">
            <i class="bi bi-cart3 fs-5"></i>
            <?php if ($cartCount > 0): ?>
                <span class="gs-cart-badge"><?= $cartCount ?></span>
            <?php endif; ?>
        </a>

        <!-- Desktop: Links da Topbar (Search, Cart, Checkout, Auth) -->
        <div class="d-none d-lg-flex align-items-center ms-auto gap-4">
            <form action="/" method="GET" class="gs-top-search m-0">
                <input type="text" name="q" class="gs-top-search-input" placeholder="SEARCH">
                <button type="submit" class="gs-top-search-btn" aria-label="Pesquisar">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="/carrinho" class="gs-top-nav-link">
                CART (<?= $cartCount ?>)
            </a>

            <a href="/carrinho/checkout" class="gs-top-nav-link">
                CHECKOUT
            </a>

            <?php if (isset($_SESSION['user'])): ?>
                <span class="gs-top-nav-link text-white">
                    <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars(strtoupper($_SESSION['user']['nome'])) ?>
                </span>
                <a href="/logout" class="gs-top-nav-link text-danger">SAIR</a>
            <?php else: ?>
                <a href="/login" class="gs-top-nav-link">LOGIN</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas Drawer (Inspirado na imagem 3 da Corteiz) -->
<div class="offcanvas offcanvas-start gs-offcanvas" tabindex="-1" id="gsMobileMenu" aria-labelledby="gsMobileMenuLabel">
    <div class="gs-offcanvas-header">
        <button type="button" class="gs-offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Fechar Menu">
            <i class="bi bi-x-lg"></i>
        </button>
        <a href="/" class="d-flex align-items-center">
            <img src="/assets/img/logo.png" alt="GreenSmiley" style="max-height: 42px;">
        </a>
        <a href="/carrinho" class="gs-cart-icon-btn">
            <i class="bi bi-cart3 fs-5"></i>
            <?php if ($cartCount > 0): ?>
                <span class="gs-cart-badge"><?= $cartCount ?></span>
            <?php endif; ?>
        </a>
    </div>

    <div class="offcanvas-body d-flex flex-column p-0">
        <nav class="gs-mobile-nav">
            <a href="/" class="active">NEW</a>
            <a href="/#catalogo">SHOP ALL</a>
            <a href="/#catalogo">CAMISETAS</a>
            <a href="/#catalogo">CALÇAS</a>
            <a href="/#catalogo">SHORTS</a>
            <a href="/#catalogo">JAQUETAS</a>
            <a href="/#catalogo">CONJUNTOS</a>
            <a href="/#catalogo">ACESSÓRIOS</a>
            <a href="/carrinho">MEU CARRINHO (<?= $cartCount ?>)</a>
            <a href="/sobre">ABOUT US</a>

            <div class="border-top border-secondary my-2"></div>

            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-white px-2 py-1 small">
                    LOGADO: <?= htmlspecialchars(strtoupper($_SESSION['user']['nome'])) ?>
                </span>
                <a href="/logout" class="text-danger">SAIR DA CONTA</a>
            <?php else: ?>
                <a href="/login">ENTRAR</a>
                <a href="/cadastro">CADASTRAR-SE</a>
            <?php endif; ?>
        </nav>

        <!-- Barra de busca no rodapé do menu mobile (imagem 3) -->
        <div class="gs-mobile-search-box">
            <form action="/" method="GET" class="gs-mobile-search-form">
                <input type="text" name="q" class="gs-mobile-search-input" placeholder="SEARCH">
                <button type="submit" class="gs-mobile-search-btn" aria-label="Pesquisar">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>
