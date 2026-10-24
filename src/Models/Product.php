<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Product
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $sql = 'SELECT p.id, p.nome_produto, p.preco, p.id_categoria, c.nome_categoria 
                FROM produtos p
                JOIN categorias c ON p.id_categoria = c.id
                ORDER BY p.id ASC';

        return $pdo->query($sql)->fetchAll();
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getConnection();

        $sqlProduct = 'SELECT p.id, p.nome_produto, p.preco, p.id_categoria, c.nome_categoria 
                       FROM produtos p
                       JOIN categorias c ON p.id_categoria = c.id
                       WHERE p.id = :id';

        $stmt = $pdo->prepare($sqlProduct);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $product = $stmt->fetch();
        if (!$product) {
            return null;
        }

        $sqlSizes = 'SELECT t.id AS id_tamanho, t.descricao AS tamanho, pt.estoque
                     FROM produto_tamanhos pt
                     JOIN tamanhos t ON pt.id_tamanho = t.id
                     WHERE pt.id_produto = :id AND pt.estoque > 0
                     ORDER BY t.id ASC';

        $stmtSizes = $pdo->prepare($sqlSizes);
        $stmtSizes->bindValue(':id', $id, PDO::PARAM_INT);
        $stmtSizes->execute();

        $product['tamanhos'] = $stmtSizes->fetchAll();

        return $product;
    }

    public static function findByCategory(int $categoryId): array
    {
        $pdo = Database::getConnection();
        $sql = 'SELECT p.id, p.nome_produto, p.preco, c.nome_categoria 
                FROM produtos p
                JOIN categorias c ON p.id_categoria = c.id
                WHERE p.id_categoria = :categoria_id
                ORDER BY p.id ASC';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':categoria_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}