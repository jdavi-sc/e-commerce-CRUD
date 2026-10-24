<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
            $dotenv->safeLoad();

            $host     = $_ENV['DB_HOST'] ?? 'localhost';
            $port     = $_ENV['DB_PORT'] ?? '5432';
            $dbName   = $_ENV['DB_DATABASE'] ?? 'greensmiley';
            $user     = $_ENV['DB_USERNAME'] ?? 'postgres';
            $password = $_ENV['DB_PASSWORD'] ?? '';

            $dsn = "pgsql:host={$host};port={$port};dbname={$dbName}";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $password, $options);
            } catch (PDOException $e) {
                error_log("Erro de Conexão com PostgreSQL: " . $e->getMessage());
                throw new PDOException("Erro ao conectar ao PostgreSQL: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
