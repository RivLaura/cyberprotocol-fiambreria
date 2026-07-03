<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;


class VentaProcesoController extends Controller
{
    public function store(Request $request)
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {

            return redirect()
                ->route('dashboard')
                ->with('error', 'No hay productos en el carrito.');
        }

        $total = 0;

        foreach ($carrito as $item) {

            $total += $item['subtotal'];
        }

        DB::beginTransaction();

        try {

            $venta = Venta::create([

                // Por ahora siempre usamos Consumidor Final
                'cliente_id' => $request->cliente_id,

                'total' => $total,

            ]);

            foreach ($carrito as $item) {

                DetalleVenta::create([

                    'venta_id' => $venta->id,

                    'producto_id' => $item['id'],

                    'cantidad' => $item['cantidad'],

                    'precio_unitario' => $item['precio'],

                    'subtotal' => $item['subtotal'],

                ]);

                foreach ($carrito as $item) {

                    $producto = Producto::find($item['id']);

                    $producto->decrement('stock', $item['cantidad']);
                }
            }

            DB::commit();

            dd('Venta creada correctamente');
        } catch (\Exception $e) {

            DB::rollBack();

            dd($e->getMessage());
        }
    }
}
