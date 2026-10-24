<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Database;
use App\Models\Product;
use App\Models\User;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbStatus = false;
$dbMessage = '';
$postgresVersion = '';
$products = [];
$usersCount = 0;

try {
    $pdo = Database::getConnection();
    $dbStatus = true;
    
    $stmt = $pdo->query('SELECT version()');
    $postgresVersion = (string) $stmt->fetchColumn();
    $dbMessage = 'Conexão com PostgreSQL estabelecida com sucesso via PDO Singleton!';

    $products = Product::all();
    $usersCount = count(User::all());

} catch (\Throwable $e) {
    $dbStatus = false;
    $dbMessage = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSmiley | Painel MVC & Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <style>
        .product-img {
            height: 220px;
            object-fit: contain;
            background-color: #f8f9fa;
        }
        .card-product {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-product:hover {
            transform: translateY(-4px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="/">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#catalogo">Catálogo</a></li>
                    <li class="nav-item">
                        <span class="badge bg-secondary ms-lg-2">Usuários: <?= $usersCount ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">

        <div class="row g-4 mb-5">
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0 fw-semibold">🔌 Status do Ambiente MVC</h2>
                        <span class="badge bg-dark">PHP <?= phpversion() ?></span>
                    </div>
                    <div class="card-body">
                        <?php if ($dbStatus): ?>
                            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                                <div>
                                    <h5 class="alert-heading mb-1">✅ Conexão Ativa com o PostgreSQL!</h5>
                                    <p class="mb-0"><?= htmlspecialchars($dbMessage) ?></p>
                                </div>
                            </div>
                            <div class="p-3 bg-body-tertiary rounded small text-muted">
                                <strong>Versão do Servidor:</strong> <code><?= htmlspecialchars($postgresVersion) ?></code>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger mb-0" role="alert">
                                <h5 class="alert-heading mb-1">❌ Falha na Conexão</h5>
                                <p class="mb-0"><?= htmlspecialchars($dbMessage) ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="row g-2 mt-3">
                            <div class="col-6 col-md-3">
                                <div class="border rounded p-2 text-center bg-white">
                                    <small class="text-muted d-block">Autoload</small>
                                    <span class="badge bg-success">PSR-4 Ativo</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="border rounded p-2 text-center bg-white">
                                    <small class="text-muted d-block">Segurança</small>
                                    <span class="badge bg-success">.env Protegido</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="border rounded p-2 text-center bg-white">
                                    <small class="text-muted d-block">Model User</small>
                                    <span class="badge bg-success">Criada & Testada</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="border rounded p-2 text-center bg-white">
                                    <small class="text-muted d-block">Model Product</small>
                                    <span class="badge bg-success">Criada & Testada</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card shadow-sm border-0 bg-success text-white h-100">
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h3 class="h5 fw-bold mb-2">🎉 Camada Model Pronta!</h3>
                            <p class="small mb-3">
                                As queries SQL manuais do MySQL foram substituídas por <strong>Models Orientadas a Objetos</strong> (<code>User</code> e <code>Product</code>) com Prepared Statements no PostgreSQL.
                            </p>
                        </div>
                        <div class="p-2 bg-black bg-opacity-25 rounded small">
                            <code>App\Models\User</code> & <code>App\Models\Product</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="catalogo" class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h3 fw-bold text-dark mb-0">🛍️ Catálogo de Produtos</h2>
                    <small class="text-muted">Carregado dinamicamente do PostgreSQL via <code>Product::all()</code></small>
                </div>
                <span class="badge bg-dark fs-6"><?= count($products) ?> itens</span>
            </div>

            <div class="row g-4">
                <?php foreach ($products as $produto): ?>
                    <?php 
                        $imgFile = "/assets/img/img{$produto['id']}.png";
                    ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card card-product h-100 border-0 shadow-sm overflow-hidden">
                            <img src="<?= htmlspecialchars($imgFile) ?>" 
                                 class="card-img-top product-img p-3" 
                                 alt="<?= htmlspecialchars($produto['nome_produto']) ?>"
                                 onerror="this.src='/assets/img/logo.png'">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <span class="badge bg-light text-success border border-success-subtle mb-2">
                                        <?= htmlspecialchars(strtoupper($produto['nome_categoria'])) ?>
                                    </span>
                                    <h3 class="h6 card-title fw-bold text-dark mb-2">
                                        <?= htmlspecialchars($produto['nome_produto']) ?>
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                    <span class="h5 mb-0 fw-bold text-success">
                                        R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                    </span>
                                    <button class="btn btn-sm btn-outline-dark" type="button">
                                        Ver Detalhes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>