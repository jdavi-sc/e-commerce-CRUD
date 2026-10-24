<?php

declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function render(string $view, array $data = []): void
    {
        extract($data);

        $basePath = dirname(__DIR__, 2) . '/views/' . ltrim($view, '/');
        $file = file_exists($basePath . '.php') ? $basePath . '.php' : $basePath . '.html';

        if (file_exists($file)) {
            require $file;
            return;
        }

        http_response_code(500);
        echo "View não encontrada: " . htmlspecialchars($view);
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    protected function json(mixed $data, int $statusCode = 200): void
