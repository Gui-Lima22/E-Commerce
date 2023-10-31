<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        return view("cart.index");
    }
}
