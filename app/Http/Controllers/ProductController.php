<?php

namespace App\Http\Controllers;

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
        $all = $this->productService->all();
        $leagues = $this->productService->getLeagues();
        $colors = $this->productService->getColors();
        return view("products.list", compact("all", "leagues", "colors"));
    }

    public function show($id): View
    {
        $product = $this->productService->getById($id);
        return view("products.show", compact("product"));
    }

    public function list(Request $request): JsonResponse
    {
       $result['status'] = 200;

        try {
            $result["data"] = $this->productService->list($request);
        } catch (Exception $e) {
            $result = [
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ];

            Log::error('ProductController/list . '  . $e);
        }

        return response()->json($result, $result['status']);
    }
}
