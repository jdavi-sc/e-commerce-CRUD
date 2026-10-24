    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSmiley | Gestão de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/assets/img/logo.png" alt="Logo" width="34" height="34" class="me-2 rounded-circle">
                <span class="fw-bold text-success">GreenSmiley Admin</span>
            </a>
            <div class="ms-auto">
                <a href="/" class="btn btn-outline-light btn-sm">Loja</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-bold mb-0">Gerenciamento de Usuários</h1>
                <small class="text-muted">Total cadastrado no PostgreSQL: <?= count($users) ?></small>
            </div>
            <a href="/cadastro" class="btn btn-success btn-sm">+ Novo Usuário</a>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="ps-3">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Data Cadastro</th>
                            <th scope="col" class="text-end pe-3">Ações</th>
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
                                    <td class="ps-3 fw-bold">#<?= htmlspecialchars((string) $u['id']) ?></td>
                                    <td><?= htmlspecialchars($u['nome']) ?></td>
                                    <td><?= htmlspecialchars($u['email']) ?></td>
                                    <td><?= htmlspecialchars($u['cpf']) ?></td>
                                    <td>
                                        <small class="text-muted">
                                            <?= !empty($u['created_at']) ? date('d/m/Y H:i', strtotime($u['created_at'])) : '-' ?>
                                        </small>
                                    </td>
                                    <td class="text-end pe-3">
                                        <form action="/admin/usuarios/deletar" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja remover este usuário?');">
                                            <input type="hidden" name="id" value="<?= (int) $u['id'] ?>">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                Excluir
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
