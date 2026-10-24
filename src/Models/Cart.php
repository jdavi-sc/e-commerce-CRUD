<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Cart
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT id, produto, preco, tamanho, created_at FROM carrinho ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public static function add(string $produto, float $preco, string $tamanho): int
    {
        $pdo = Database::getConnection();

        $sql = 'INSERT INTO carrinho (produto, preco, tamanho) 
                VALUES (:produto, :preco, :tamanho) 
                RETURNING id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':produto', trim($produto), PDO::PARAM_STR);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':tamanho', trim($tamanho), PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    public static function remove(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM carrinho WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public static function clear(): void
    {
        $pdo = Database::getConnection();
        $pdo->exec('DELETE FROM carrinho');
    }

    public static function count(): int
    {
        $pdo = Database::getConnection();
        return (int) $pdo->query('SELECT COUNT(*) FROM carrinho')->fetchColumn();
    }

    public static function total(): float
    {
        $pdo = Database::getConnection();
        $total = $pdo->query('SELECT COALESCE(SUM(preco), 0) FROM carrinho')->fetchColumn();
        return (float) $total;
    }
}
