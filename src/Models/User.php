<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class User
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT id, nome, email, cpf, created_at FROM usuarios ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public static function findById(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT id, nome, email, cpf, created_at FROM usuarios WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT id, nome, email, senha, cpf, created_at FROM usuarios WHERE email = :email');
        $stmt->bindValue(':email', trim($email), PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function emailExists(string $email, ?int $excludeId = null): bool
    {
        $pdo = Database::getConnection();
        $sql = 'SELECT 1 FROM usuarios WHERE email = :email';

        if ($excludeId !== null) {
            $sql .= ' AND id != :excludeId';
        }

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', trim($email), PDO::PARAM_STR);

        if ($excludeId !== null) {
            $stmt->bindValue(':excludeId', $excludeId, PDO::PARAM_INT);
        }

        $stmt->execute();
        return (bool) $stmt->fetchColumn();
    }

    public static function create(string $nome, string $email, string $senha, string $cpf): int
    {
        $pdo = Database::getConnection();

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO usuarios (nome, email, senha, cpf) 
                VALUES (:nome, :email, :senha, :cpf) 
                RETURNING id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', trim($nome), PDO::PARAM_STR);
        $stmt->bindValue(':email', trim($email), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
        $stmt->bindValue(':cpf', trim($cpf), PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    public static function updateByEmail(string $email, string $nome, ?string $novaSenha = null): bool
    {
        $pdo = Database::getConnection();

        $fields = ['nome = :nome'];
        $params = [
            ':nome' => trim($nome),
            ':email' => trim($email)
        ];

        if (!empty($novaSenha)) {
            $fields[] = 'senha = :senha';
            $params[':senha'] = password_hash($novaSenha, PASSWORD_DEFAULT);
        }

        $sql = 'UPDATE usuarios SET ' . implode(', ', $fields) . ' WHERE email = :email';

        $stmt = $pdo->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public static function deleteByEmail(string $email): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE email = :email');
        $stmt->bindValue(':email', trim($email), PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public static function authenticate(string $email, string $senha): ?array
    {
        $user = self::findByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {
            unset($user['senha']);
            return $user;
        }

        return null;
    }
}