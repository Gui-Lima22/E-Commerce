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
    public function all()
    {
        $allProducts = array();
        try {
            $response = Http::get("127.0.0.1:8080/api/products");

            if ($response->status() !== 200) {
                Throw new InvalidArgumentException("Erro ao realizar a requisição");
            }

            $allProducts = json_decode($response->body());
        } catch (Exception $e) {
            Log::error("HomeService/all. " . $e->getTraceAsString());
        }

        usort($allProducts, function ($a, $b) { return strcmp($a->team, $b->team); });

        return $allProducts;
    }

    public function list($request): LengthAwarePaginator
    {
        $data = $request->all();

        $page = $data['page'];

        $products = array();
        try {
            $response = Http::post("127.0.0.1:8080/api/products/list", [
                "teamsFilters" => json_decode($data['teamsFilters']),
                "leaguesFilters" => json_decode($data['leaguesFilters']),
                "colorsFilters" => json_decode($data['colorsFilters']),
                "orderBy" => json_decode($data['orderBy']),
            ]);

            if ($response->status() !== 200) {
                Throw new InvalidArgumentException("Erro ao realizar a requisição");
            }

            $products = json_decode($response->body(), true);
        } catch (Exception $e) {
            Log::error("HomeService/list. " . $e->getTraceAsString());
        }

        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        $dataItems = array_slice($products, $offset, $perPage);

        return new LengthAwarePaginator(
            $dataItems,
            count($products),
            $perPage,
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

    public function getLeagues(): array
    {
        return [
            [
                "id" => "premier-league",
                "text" => "Premier League"
            ],
            [
                "id" => "la-liga",
                "text" => "La Liga"
            ],
            [
                "id" => "serie-a",
                "text" => "Italiano – Série A"
            ],
            [
                "id" => "ligue-1",
                "text" => "Ligue 1"
            ],
            [
                "id" => "bundesliga",
                "text" => "Bundesliga"
            ],
            [
                "id" => "primeira-liga",
                "text" => "Primeira Liga"
            ],
            [
                "id" => "eredivisie",
                "text" => "Eredivisie"
            ]
        ];
    }

    public function getColors(): array
    {
        return  [
            [
                "id" => "yellow",
                "text" => "Amarelo"
            ],
            [
                "id" => "blue",
                "text" => "Azul"
            ],
            [
                "id" => "white",
                "text" => "Branco"
            ],
            [
                "id" => "garnet",
                "text" => "Garnet"
            ],
            [
                "id" => "orange",
                "text" => "Laranja"
            ],
            [
                "id" => "black",
                "text" => "Preto"
            ],
            [
                "id" => "green",
                "text" => "Verde"
            ],
            [
                "id" => "red",
                "text" => "Vermelho"
            ]
        ];
    }
}
