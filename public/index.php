<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Database;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$dbStatus = false;
$dbMessage = '';
$postgresVersion = '';

try {
    $pdo = Database::getConnection();
    $dbStatus = true;
    
    $stmt = $pdo->query('SELECT version()');
    $postgresVersion = (string) $stmt->fetchColumn();
    $dbMessage = 'Conexão com PostgreSQL estabelecida com sucesso via PDO Singleton!';
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
    <title>GreenSmiley | Teste de Ambiente MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
</head>
<body class="bg-light">

    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <img src="/assets/img/logo.png" alt="Logo" width="45" height="45" class="me-3 rounded-circle border">
                <div>
                    <h1 class="h4 mb-0 fw-bold text-success">GreenSmiley</h1>
                    <small class="text-muted">Painel de Diagnóstico do Ambiente MVC</small>
                </div>
            </div>
            <span class="badge bg-dark">PHP <?= phpversion() ?></span>
        </header>

        <div class="row g-4">
            <div class="col-12 col-md-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0 fw-semibold">🔌 Status da Conexão com o Banco</h2>
                    </div>
                    <div class="card-body">
                        <?php if ($dbStatus): ?>
                            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                                <div>
                                    <h5 class="alert-heading mb-1">✅ Conexão Ativa!</h5>
                                    <p class="mb-0"><?= htmlspecialchars($dbMessage) ?></p>
                                </div>
                            </div>
                            <div class="p-3 bg-body-tertiary rounded">
                                <small class="text-muted d-block fw-bold mb-1">Informações do Servidor:</small>
                                <code class="small text-break"><?= htmlspecialchars($postgresVersion) ?></code>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger mb-3" role="alert">
                                <h5 class="alert-heading mb-1">❌ Falha na Conexão</h5>
                                <p class="mb-2"><?= htmlspecialchars($dbMessage) ?></p>
                                <hr>
                                <p class="small mb-0">Verifique se o seu arquivo <code>.env</code> na raiz do projeto está preenchido com as credenciais corretas do seu PostgreSQL local.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0 fw-semibold">🏗️ Arquitetura e Recursos Ativos</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Autoload PSR-4</strong>
                                    <div class="small text-muted">Namespace <code>App\</code> mapeado para <code>src/</code></div>
                                </div>
                                <span class="badge bg-success rounded-pill">Ativo</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Proteção de Credenciais (.env)</strong>
                                    <div class="small text-muted">Biblioteca <code>vlucas/phpdotenv</code></div>
                                </div>
                                <span class="badge bg-success rounded-pill">Ativo</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Driver de Banco</strong>
                                    <div class="small text-muted">PDO PostgreSQL (Singleton Pattern)</div>
                                </div>
                                <span class="badge <?= $dbStatus ? 'bg-success' : 'bg-warning text-dark' ?> rounded-pill">
                                    <?= $dbStatus ? 'Conectado' : 'Aguardando credenciais' ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <strong>Front Controller</strong>
                                    <div class="small text-muted">Ponto único de entrada em <code>public/index.php</code></div>
                                </div>
                                <span class="badge bg-success rounded-pill">Ativo</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-0 bg-success text-white mb-4">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold">🎯 Próximo Marco</h3>
                        <p class="small mb-3">O ambiente básico está estruturado e protegido. O próximo passo é criar a primeira Model (<code>User.php</code>) e o Router de rotas amigáveis.</p>
                        <hr class="border-light">
                        <small class="d-block opacity-75">Mobile First & Bootstrap 5</small>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="h6 fw-bold mb-2">Comando para Rodar Local:</h4>
                        <div class="p-2 bg-dark text-white rounded small mb-2">
                            <code>php -S localhost:8000 -t public</code>
                        </div>
                        <small class="text-muted">Aponte o servidor web sempre para a pasta <code>public</code>.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
