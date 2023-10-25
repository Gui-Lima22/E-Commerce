<?php

namespace App\Services;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    public function getAllProducts($request): LengthAwarePaginator
    {
        $page = $request->all()['page'];

        $products = array();
        try {
            $response = Http::get("127.0.0.1:8080/api/products");

            if ($response->status() !== 200) {
                Throw new InvalidArgumentException("Erro ao realizar a requisição");
            }

            $products = json_decode($response->body());
        } catch (Exception $e) {
            Log::error("HomeService/getAllProducts. " . $e->getTraceAsString());
        }

        $offset = ($page * 5) - 5;

        $dataItems = collect($products)->slice($offset, 5)->all();

        return new LengthAwarePaginator(
            $dataItems,
            count($products),
            5,
            $page,
        );
    }

    public function getById($id)
    {
        $product = array();
        try {
            $response = Http::get("127.0.0.1:8080/api/products/$id");

            if ($response->status() !== 200) {
                Throw new InvalidArgumentException("Erro ao realizar a requisição");
            }

            $product = json_decode($response->body());
        } catch (Exception $e) {
            Log::error("HomeService/getAllProducts. " . $e->getTraceAsString());
        }

        return $product;
    }
}
