<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenFoodFactsService
{
    public function buscarPorCodigo(string $codigo): ?array
    {
        try {

            $url = "https://world.openfoodfacts.org/api/v2/product/{$codigo}.json";

            $response = Http::timeout(5)->get($url);

            if (! $response->successful()) {
                return null;
            }

            $producto = $response->json();

            if (($producto['status'] ?? 0) == 0) {
                return null;
            }

            return [
                'nombre' => $producto['product']['product_name'] ?? '',
                'marca' => $producto['product']['brands'] ?? '',
                'imagen' => $producto['product']['image_front_url'] ?? '',
                'categoria' => $producto['product']['categories'] ?? '',
            ];

        } catch (\Exception $e) {

            return null;

        }
    }
}