<?php

namespace App\Http\Controllers;

use App\Services\OpenFoodFactsService;

class OpenFoodFactsController extends Controller
{
    public function buscar(string $codigo, OpenFoodFactsService $service)
    {
        $producto = $service->buscarPorCodigo($codigo);

        if (!$producto) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'producto' => $producto
        ]);
    }
}