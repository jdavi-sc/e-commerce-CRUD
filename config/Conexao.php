<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Database;

try {
    $conexao = Database::getConnection();
} catch (\PDOException $e) {
    die("Falha na conexão com o banco de dados.");
}   