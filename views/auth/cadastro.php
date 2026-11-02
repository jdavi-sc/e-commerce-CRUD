<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | GreenSmiley</title>
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Custom Theme CSS -->
    <link href="/assets/css/greensmiley.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body>

    <div class="gs-auth-wrap">
        <div class="gs-auth-card">
            
            <a href="/" class="d-inline-block mb-3">
                <img src="/assets/img/logo.png" alt="GreenSmiley" class="gs-logo" style="max-height: 58px;">
            </a>

            <h1 class="gs-auth-title">CRIE SUA CONTA</h1>
            <p class="gs-auth-subtitle">JUNTE-SE À FAMÍLIA GREENSMILEY</p>

            <?php if (!empty($error)): ?>
                <div class="gs-alert gs-alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="/cadastro" method="POST" novalidate>
                <div class="text-start mb-3">
                    <label for="nome" class="gs-form-label">NOME COMPLETO</label>
                    <input type="text" class="form-control gs-input" id="nome" name="nome" placeholder="SEU NOME" required autofocus>
                </div>

                <div class="text-start mb-3">
                    <label for="email" class="gs-form-label">E-MAIL</label>
                    <input type="email" class="form-control gs-input" id="email" name="email" placeholder="SEU@EMAIL.COM" required>
                </div>

                <div class="text-start mb-3">
                    <label for="cpf" class="gs-form-label">CPF</label>
                    <input type="text" class="form-control gs-input" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
                </div>

                <div class="text-start mb-4">
                    <label for="senha" class="gs-form-label">SENHA</label>
                    <input type="password" class="form-control gs-input" id="senha" name="senha" placeholder="MÍNIMO 5 CARACTERES" minlength="5" required>
                </div>

                <button type="submit" class="gs-btn gs-btn-primary w-100 py-3 mb-3">
                    CADASTRAR
                </button>
            </form>

            <div class="gs-auth-footer">
                <p class="mb-2">
                    JÁ POSSUI CONTA? <a href="/login" class="text-white text-decoration-underline">FAÇA LOGIN</a>
                </p>
                <a href="/" class="text-muted small">
                    <i class="bi bi-arrow-left me-1"></i>VOLTAR À LOJA
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
