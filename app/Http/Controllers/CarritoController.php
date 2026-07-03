<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function add(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        $carrito = session()->get('carrito', []);

        // Si el producto ya existe, por ahora no hacemos nada.
        if (!isset($carrito[$producto->id])) {

            $carrito[$producto->id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'subtotal' => $producto->precio,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back();
    }

}
