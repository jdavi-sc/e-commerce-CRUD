<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSmiley | Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-4">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                <div class="card border-0 shadow-sm rounded-4 p-3 p-sm-4 bg-white">
                    <div class="text-center mb-4">
                        <a href="/">
                            <img src="/assets/img/logo.png" alt="Logo" width="70" height="70" class="rounded-circle mb-2">
                        </a>
                        <h1 class="h4 fw-bold text-dark mb-1">Crie sua conta</h1>
                        <p class="text-muted small mb-0">Cadastre-se para comprar no GreenSmiley</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger py-2 px-3 small" role="alert">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form action="/cadastro" method="POST" novalidate>
                        <div class="mb-3">
                            <label for="nome" class="form-label small fw-semibold text-muted">Nome Completo</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="nome" name="nome" placeholder="Seu nome" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold text-muted">E-mail</label>
                            <input type="email" class="form-control form-control-lg fs-6" id="email" name="email" placeholder="seu@email.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label small fw-semibold text-muted">CPF</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label small fw-semibold text-muted">Senha</label>
                            <input type="password" class="form-control form-control-lg fs-6" id="senha" name="senha" placeholder="Mínimo 5 caracteres" minlength="5" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 fs-6 fw-semibold mb-3">
                            Cadastrar
                        </button>
                    </form>

                    <div class="text-center border-top pt-3">
                        <p class="small text-muted mb-1">
                            Já possui conta? <a href="/login" class="text-success text-decoration-none fw-semibold">Faça Login</a>
                        </p>
                        <a href="/" class="small text-secondary text-decoration-none">Voltar à loja</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>