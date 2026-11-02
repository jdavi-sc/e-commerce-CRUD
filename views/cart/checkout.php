<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | GreenSmiley</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="/assets/css/greensmiley.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body>

    <nav class="navbar sticky-top gs-navbar">
        <div class="container-fluid px-3 px-md-5">
            <a class="gs-brand-wrap mx-auto" href="/">
                <img src="/assets/img/logo.png" alt="GreenSmiley" class="gs-logo">
            </a>
        </div>
    </nav>

    <div class="container py-4 py-md-5">

        <div class="gs-checkout-steps">
            <div class="gs-checkout-step completed"><i class="bi bi-check-lg"></i></div>
            <div class="gs-checkout-step-line active"></div>
            <div class="gs-checkout-step active">2</div>
            <div class="gs-checkout-step-line"></div>
            <div class="gs-checkout-step">3</div>
        </div>

        <div class="text-center mb-4">
            <h1 class="gs-page-title justify-content-center">CHECKOUT</h1>
            <p class="text-muted small">INFORME OS DADOS DE ENTREGA E PAGAMENTO</p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-12 col-lg-7">
                
                <div class="gs-cart-summary-box mb-4">
                    <h2 class="gs-cart-summary-title">
                        <i class="bi bi-geo-alt me-2"></i>ENDEREÇO DE ENTREGA
                    </h2>
                    
                    <div class="row g-3">
                        <div class="col-12 col-md-8">
                            <label for="rua" class="gs-form-label">RUA / AVENIDA</label>
                            <input type="text" class="form-control gs-input" id="rua" placeholder="RUA DAS FLORES..." required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="numero" class="gs-form-label">NÚMERO</label>
                            <input type="text" class="form-control gs-input" id="numero" placeholder="123" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="bairro" class="gs-form-label">BAIRRO</label>
                            <input type="text" class="form-control gs-input" id="bairro" placeholder="CENTRO" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="cep" class="gs-form-label">CEP</label>
                            <input type="text" class="form-control gs-input" id="cep" placeholder="00000-000" maxlength="9" required>
                        </div>
                        <div class="col-12 col-md-8">
                            <label for="cidade" class="gs-form-label">CIDADE</label>
                            <input type="text" class="form-control gs-input" id="cidade" placeholder="SÃO PAULO" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="estado" class="gs-form-label">ESTADO (UF)</label>
                            <select class="form-select gs-input" id="estado" required>
                                <option value="">UF</option>
                                <option value="AC">AC</option><option value="AL">AL</option>
                                <option value="AP">AP</option><option value="AM">AM</option>
                                <option value="BA">BA</option><option value="CE">CE</option>
                                <option value="DF">DF</option><option value="ES">ES</option>
                                <option value="GO">GO</option><option value="MA">MA</option>
                                <option value="MT">MT</option><option value="MS">MS</option>
                                <option value="MG">MG</option><option value="PA">PA</option>
                                <option value="PB">PB</option><option value="PR">PR</option>
                                <option value="PE">PE</option><option value="PI">PI</option>
                                <option value="RJ">RJ</option><option value="RN">RN</option>
                                <option value="RS">RS</option><option value="RO">RO</option>
                                <option value="RR">RR</option><option value="SC">SC</option>
                                <option value="SP">SP</option><option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="gs-cart-summary-box">
                    <h2 class="gs-cart-summary-title">
                        <i class="bi bi-credit-card me-2"></i>FORMA DE PAGAMENTO
                    </h2>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="cartao" class="gs-form-label">NÚMERO DO CARTÃO</label>
                            <input type="text" class="form-control gs-input" id="cartao" placeholder="0000 0000 0000 0000" maxlength="19" required>
                        </div>
                        <div class="col-12">
                            <label for="titular" class="gs-form-label">NOME IMPRESSO NO CARTÃO</label>
                            <input type="text" class="form-control gs-input" id="titular" placeholder="NOME COMPLETO" required>
                        </div>
                        <div class="col-6">
                            <label for="validade" class="gs-form-label">VALIDADE (MM/AA)</label>
                            <input type="text" class="form-control gs-input" id="validade" placeholder="12/28" maxlength="5" required>
                        </div>
                        <div class="col-6">
                            <label for="cvv" class="gs-form-label">CVV</label>
                            <input type="text" class="form-control gs-input" id="cvv" placeholder="123" maxlength="4" required>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-5">
                <div class="gs-cart-summary-box">
                    <h2 class="gs-cart-summary-title">ITENS DO PEDIDO</h2>

                    <div class="mb-3">
                        <?php foreach ($items as $item): ?>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark">
                                <div>
                                    <div class="gs-cart-item-name"><?= htmlspecialchars(strtoupper($item['produto'])) ?></div>
                                    <small class="text-muted">TAMANHO: <?= htmlspecialchars($item['tamanho']) ?></small>
                                </div>
                                <span class="fw-bold">R$ <?= number_format((float) $item['preco'], 2, ',', '.') ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="gs-summary-line">
                        <span class="text-muted">SUBTOTAL</span>
                        <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                    </div>

                    <div class="gs-summary-line">
                        <span class="text-muted">FRETE</span>
                        <span class="text-white">GRÁTIS</span>
                    </div>

                    <div class="gs-summary-line total">
                        <span>TOTAL A PAGAR</span>
                        <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                    </div>

                    <form action="/carrinho/finalizar" method="POST" class="mt-4">
                        <button type="submit" class="gs-btn gs-btn-primary w-100 py-3">
                            <i class="bi bi-lock-fill me-2"></i>CONFIRMAR PEDIDO
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/carrinho" class="text-muted small text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i>VOLTAR AO CARRINHO
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
