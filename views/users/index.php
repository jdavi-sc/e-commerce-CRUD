<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin | GreenSmiley</title>
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

    <nav class="navbar sticky-top gs-navbar">
        <div class="container-fluid px-3 px-md-5">
            <a class="gs-brand-wrap" href="/">
                <img src="/assets/img/logo.png" alt="GreenSmiley" class="gs-logo">
                <span class="ms-2 fw-bold text-white small">ADMIN CONSOLE</span>
            </a>
            <div class="ms-auto d-flex gap-2">
                <a href="/" class="gs-btn gs-btn-outline py-1 px-3 small">LOJA</a>
                <a href="/logout" class="gs-btn gs-btn-danger-outline py-1 px-3 small">SAIR</a>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-md-5">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="gs-page-title mb-1">
                    <i class="bi bi-people me-2"></i>USUÁRIOS
                </h1>
                <small class="text-muted">TOTAL REGISTRADO NO BANCO: <?= count($users) ?></small>
            </div>
            <a href="/cadastro" class="gs-btn gs-btn-primary py-2 px-3">
                <i class="bi bi-plus-lg me-1"></i>NOVO USUÁRIO
            </a>
        </div>

        <div class="gs-cart-summary-box p-0 overflow-hidden">
            <div class="table-responsive">
                <table class="gs-table-dark mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>CPF</th>
                            <th>DATA CADASTRO</th>
                            <th class="text-end pe-3">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Nenhum usuário cadastrado até o momento.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $u): ?>
                                <tr>
                                    <td class="ps-3 fw-bold text-white">#<?= htmlspecialchars((string) $u['id']) ?></td>
                                    <td class="text-white"><?= htmlspecialchars($u['nome']) ?></td>
                                    <td><?= htmlspecialchars($u['email']) ?></td>
                                    <td><?= htmlspecialchars($u['cpf']) ?></td>
                                    <td class="small text-muted">
                                        <?= !empty($u['created_at']) ? date('d/m/Y H:i', strtotime($u['created_at'])) : '-' ?>
                                    </td>
                                    <td class="text-end pe-3">
                                        <form action="/admin/usuarios/deletar" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            <input type="hidden" name="id" value="<?= (int) $u['id'] ?>">
                                            <button type="submit" class="gs-btn gs-btn-danger-outline py-1 px-2 small" title="Excluir">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php include __DIR__ . '/../layouts/Footer.php'; ?>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
