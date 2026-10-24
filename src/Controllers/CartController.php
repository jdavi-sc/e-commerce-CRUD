<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(): void
    {
        $items = Cart::all();
        $total = Cart::total();
        $count = Cart::count();

        $this->render('cart/index', [
            'items' => $items,
            'total' => $total,
            'count' => $count,
        ]);
    }

    public function add(): void
    {
        $produto = filter_input(INPUT_POST, 'nomeProduto', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco   = filter_input(INPUT_POST, 'precoProduto', FILTER_VALIDATE_FLOAT);
        $tamanho = filter_input(INPUT_POST, 'Tamanhos', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$produto || $preco === false || $preco === null || $preco <= 0 || !$tamanho) {
            $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Dados inválidos. Tente novamente.'];
            $this->redirect('/');
        }

        Cart::add($produto, $preco, $tamanho);

        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Produto adicionado ao carrinho!'];
        $this->redirect('/carrinho');
    }

    public function remove(): void
    {
        $id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);

        if (!$id || $id <= 0) {
            $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Item inválido.'];
            $this->redirect('/carrinho');
        }

        $removed = Cart::remove($id);

        $_SESSION['flash'] = $removed
            ? ['type' => 'success', 'message' => 'Item removido do carrinho.']
            : ['type' => 'warning', 'message' => 'Item não encontrado.'];

        $this->redirect('/carrinho');
    }

    public function clear(): void
    {
        Cart::clear();
        $_SESSION['flash'] = ['type' => 'info', 'message' => 'Carrinho esvaziado.'];
        $this->redirect('/carrinho');
    }

    public function checkout(): void
    {
        $items = Cart::all();
        $total = Cart::total();

        if (empty($items)) {
            $_SESSION['flash'] = ['type' => 'warning', 'message' => 'Seu carrinho está vazio.'];
            $this->redirect('/carrinho');
        }

        $this->render('cart/checkout', [
            'items' => $items,
            'total' => $total,
        ]);
    }

    public function finalize(): void
    {
        $items = Cart::all();

        if (empty($items)) {
            $_SESSION['flash'] = ['type' => 'warning', 'message' => 'Carrinho vazio.'];
            $this->redirect('/carrinho');
        }

        Cart::clear();

        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Pedido realizado com sucesso! Obrigado pela compra.'];
        $this->redirect('/');
    }
}
