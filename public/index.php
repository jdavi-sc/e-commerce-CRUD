<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ProductController;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/produto', [ProductController::class, 'show']);
$router->get('/login', [UserController::class, 'loginForm']);
$router->post('/login', [UserController::class, 'login']);
$router->get('/cadastro', [UserController::class, 'registerForm']);
$router->post('/cadastro', [UserController::class, 'register']);
$router->get('/logout', [UserController::class, 'logout']);
$router->get('/admin/usuarios', [UserController::class, 'admin']);
$router->post('/admin/usuarios/deletar', [UserController::class, 'delete']);

$router->dispatch($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');