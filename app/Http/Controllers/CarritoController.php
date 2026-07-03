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

        $cantidad = (float) $request->cantidad;
        $subtotal = (float) $request->subtotal;

        $carrito[$producto->id] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => $cantidad,
            'subtotal' => $subtotal,
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('dashboard');
    }

    public function destroy($productoId)
    {
        $carrito = session()->get('carrito', []);

        unset($carrito[$productoId]);

        session()->put('carrito', $carrito);

        return redirect()->route('dashboard');
    }
}
