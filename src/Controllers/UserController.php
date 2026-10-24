<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function loginForm(): void
    {
        if (isset($_SESSION['user'])) {
            $this->redirect('/');
        }

        $error = $_SESSION['flash_error'] ?? null;
        $success = $_SESSION['flash_success'] ?? null;
        unset($_SESSION['flash_error'], $_SESSION['flash_success']);

        $this->render('auth/login', [
            'error' => $error,
            'success' => $success
        ]);
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {
            $_SESSION['flash_error'] = 'Preencha o e-mail e a senha.';
            $this->redirect('/login');
        }

        $user = User::authenticate($email, $senha);

        if ($user) {
            $_SESSION['user'] = $user;
            $this->redirect('/');
        }

        $_SESSION['flash_error'] = 'E-mail ou senha inválidos.';
        $this->redirect('/login');
    }

    public function registerForm(): void
    {
        if (isset($_SESSION['user'])) {
            $this->redirect('/');
        }

        $error = $_SESSION['flash_error'] ?? null;
        unset($_SESSION['flash_error']);

        $this->render('auth/cadastro', [
            'error' => $error
        ]);
    }

    public function register(): void
    {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');
        $cpf = trim($_POST['cpf'] ?? '');

        if (empty($nome) || empty($email) || empty($senha) || empty($cpf)) {
            $_SESSION['flash_error'] = 'Todos os campos são obrigatórios.';
            $this->redirect('/cadastro');
        }

        if (User::emailExists($email)) {
            $_SESSION['flash_error'] = 'Este e-mail já está cadastrado.';
            $this->redirect('/cadastro');
        }

        try {
            User::create($nome, $email, $senha, $cpf);
            $_SESSION['flash_success'] = 'Cadastro realizado com sucesso! Faça seu login.';
            $this->redirect('/login');
        } catch (\Throwable $e) {
            $_SESSION['flash_error'] = 'Erro ao cadastrar usuário. Tente novamente.';
            $this->redirect('/cadastro');
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->redirect('/login');
    }

    public function admin(): void
    {
        $users = User::all();
        $this->render('users/index', [
            'users' => $users
        ]);
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            User::delete($id);
        }

        $this->redirect('/admin/usuarios');
    }
}