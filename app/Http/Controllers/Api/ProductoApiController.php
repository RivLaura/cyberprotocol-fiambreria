<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Listado de productos.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'nombre');

        $direccion = $request->get('direccion', 'asc');

        $columnasPermitidas = [
            'nombre',
            'precio',
            'stock',
            'fecha_vencimiento'
        ];

        if (! in_array($sort, $columnasPermitidas)) {
            $sort = 'nombre';
        }

        if (! in_array($direccion, ['asc', 'desc'])) {
            $direccion = 'asc';
        }

        $productos = Producto::with('categoria')
            ->when($request->buscar, function ($query) use ($request) {

                $query->where('nombre', 'like', '%' . $request->buscar . '%');
            })
            ->when($request->categoria, function ($query) use ($request) {

                $query->where('categoria_id', $request->categoria);
            })
            ->orderBy($sort, $direccion)
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Listado de productos obtenido correctamente.',

            'pagination' => [
                'current_page' => $productos->currentPage(),
                'last_page' => $productos->lastPage(),
                'per_page' => $productos->perPage(),
                'total' => $productos->total(),
            ],

            'filters' => [

                'buscar' => $request->buscar,
                'categoria' => $request->categoria,
                'sort' => $sort,
                'direccion' => $direccion,
            ],

            'data' => ProductoResource::collection($productos),

        ], 200);
    }

    /**
     * Mostrar un producto.
     */
    public function show($id)
    {
        $producto = Producto::with('categoria')->find($id);

        if (!$producto) {

            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Producto encontrado.',
            'data' => new ProductoResource($producto),
        ], 200);
    }

    public function stockBajo()
    {
        $productos = Producto::with('categoria')
            ->whereColumn('stock', '<=', 'stock_minimo')
            ->orderBy('nombre')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Productos con stock bajo.',
            'total' => $productos->count(),
            'data' => ProductoResource::collection($productos),
        ]);
    }
}
