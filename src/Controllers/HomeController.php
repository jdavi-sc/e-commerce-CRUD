<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index(): void
    {
        $products = Product::all();
        $usersCount = count(User::all());

        $this->render('home/index', [
            'products' => $products,
            'usersCount' => $usersCount
        ]);
    }
}