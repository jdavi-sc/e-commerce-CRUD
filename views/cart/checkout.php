<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | GreenSmiley</title>
    <meta name="description" content="Finalize seu pedido GreenSmiley de forma rápida e segura.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <style>
        .checkout-step {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.85rem;
        }
        .checkout-step.active {
            background-color: #198754;
            color: #fff;
        }
        .checkout-step.done {
            background-color: #198754;
            color: #fff;
        }
        .checkout-step.pending {
            background-color: #e9ecef;
            color: #6c757d;
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
        </div>
    </nav>

    <div class="container py-4">

        <div class="d-flex align-items-center justify-content-center gap-2 mb-4">
            <span class="checkout-step done"><i class="bi bi-check-lg"></i></span>
            <div class="border-top border-success flex-grow-0" style="width: 40px;"></div>
            <span class="checkout-step active">2</span>
            <div class="border-top flex-grow-0" style="width: 40px;"></div>
            <span class="checkout-step pending">3</span>
        </div>

        <h1 class="h3 fw-bold text-dark text-center mb-4">
            <i class="bi bi-credit-card text-success me-2"></i>Checkout
        </h1>

        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h2 class="h5 fw-bold text-dark mb-3">
                        <i class="bi bi-geo-alt text-success me-2"></i>Endereço de Entrega
                    </h2>
                    <div class="row g-3">
                        <div class="col-12 col-md-8">
                            <label for="rua" class="form-label fw-semibold">Rua</label>
                            <input type="text" class="form-control" id="rua" placeholder="Rua, Avenida..." required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="numero" class="form-label fw-semibold">Número</label>
                            <input type="text" class="form-control" id="numero" placeholder="Nº" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="bairro" class="form-label fw-semibold">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="cep" class="form-label fw-semibold">CEP</label>
                            <input type="text" class="form-control" id="cep" placeholder="00000-000" maxlength="9" required>
                        </div>
                        <div class="col-12 col-md-8">
                            <label for="cidade" class="form-label fw-semibold">Cidade</label>
                            <input type="text" class="form-control" id="cidade" placeholder="Cidade" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="estado" class="form-label fw-semibold">Estado</label>
                            <select class="form-select" id="estado" required>
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

                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h2 class="h5 fw-bold text-dark mb-3">
                        <i class="bi bi-credit-card-2-front text-success me-2"></i>Forma de Pagamento
                    </h2>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="cartao" class="form-label fw-semibold">Número do Cartão</label>
                            <input type="text" class="form-control" id="cartao" placeholder="0000 0000 0000 0000" maxlength="19" required>
                        </div>
                        <div class="col-12">
                            <label for="titular" class="form-label fw-semibold">Nome no Cartão</label>
                            <input type="text" class="form-control" id="titular" placeholder="Como impresso no cartão" required>
                        </div>
                        <div class="col-6">
                            <label for="validade" class="form-label fw-semibold">Validade</label>
                            <input type="text" class="form-control" id="validade" placeholder="MM/AA" maxlength="5" required>
                        </div>
                        <div class="col-6">
                            <label for="cvv" class="form-label fw-semibold">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="000" maxlength="4" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h2 class="h5 fw-bold text-dark mb-3">
                        <i class="bi bi-receipt text-success me-2"></i>Resumo do Pedido
                    </h2>

                    <div class="list-group list-group-flush mb-3">
                        <?php foreach ($items as $item): ?>
                            <div class="list-group-item px-0 d-flex justify-content-between align-items-center border-0">
                                <div>
                                    <span class="fw-semibold text-dark"><?= htmlspecialchars($item['produto']) ?></span>
                                    <small class="d-block text-muted">Tamanho: <?= htmlspecialchars($item['tamanho']) ?></small>
                                </div>
                                <span class="fw-bold text-success">R$ <?= number_format((float) $item['preco'], 2, ',', '.') ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between text-muted mb-2">
                        <span>Subtotal</span>
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

                    <form action="/carrinho/finalizar" method="POST">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg fw-semibold py-3">
                                <i class="bi bi-bag-check-fill me-2"></i>Confirmar Pedido
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-shield-lock-fill text-success me-1"></i>Transação protegida e criptografada
                        </small>
                    </div>

                    <div class="text-center mt-2">
                        <a href="/carrinho" class="text-decoration-none text-muted small">
                            <i class="bi bi-arrow-left me-1"></i>Voltar ao carrinho
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
