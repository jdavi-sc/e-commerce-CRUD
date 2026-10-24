<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(): void
    {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

        if (!$id || $id <= 0) {
            $this->redirect('/');
        }

        $product = Product::findById((int) $id);

        if (!$product) {
            $this->redirect('/');
        }

        $this->render('products/show', [
            'product' => $product
        ]);
    }
}