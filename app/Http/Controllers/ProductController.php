<?php

namespace App\Http\Controllers;

use App\Helpers\HelperException;
use App\Services\ProductService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        return view("products.index");
    }

    public function show($id): View
    {
        $product = $this->productService->getById($id);
        return view("products.show", compact("product"));
    }

    public function allProducts(Request $request): JsonResponse
    {
       $result['status'] = 200;

        try {
            $result["data"] = $this->productService->getAllProducts($request);
        } catch (Exception $e) {
            $result = [
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ];

            Log::error('ProductController/allProducts . '  . $e);
        }

        return response()->json($result, $result['status']);
    }
}
