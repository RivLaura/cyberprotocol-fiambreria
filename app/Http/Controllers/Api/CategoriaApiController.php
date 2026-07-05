<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;

class CategoriaApiController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return response()->json([
            'success' => true,
            'message' => 'Listado de categorías obtenido correctamente.',
            'total' => $categorias->count(),
            'data' => CategoriaResource::collection($categorias),
        ]);
    }
}