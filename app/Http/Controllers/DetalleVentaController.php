<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * AGREGAR PRODUCTO A LA VENTA
     */
    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        $subtotal = $request->cantidad * $producto->precio;

        $detalle = DetalleVenta::create([
            'venta_id' => $request->venta_id,
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $subtotal,
        ]);

        $this->recalcularTotal($request->venta_id);

        return redirect()
            ->back()
            ->with('success', 'Producto agregado a la venta');
    }

    /**
     * MODIFICAR PRODUCTO DEL DETALLE
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $detalle = DetalleVenta::findOrFail($id);

        $subtotal = $request->cantidad * $detalle->precio_unitario;

        $detalle->update([
            'cantidad' => $request->cantidad,
            'subtotal' => $subtotal,
        ]);

        $this->recalcularTotal($detalle->venta_id);

        return redirect()
            ->back()
            ->with('success', 'Detalle actualizado correctamente');
    }

    /**
     * ELIMINAR PRODUCTO DEL DETALLE
     */
    public function destroy($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $ventaId = $detalle->venta_id;

        $detalle->delete();

        $this->recalcularTotal($ventaId);

        return redirect()
            ->back()
            ->with('success', 'Producto eliminado de la venta');
    }

    /**
     * RECALCULAR TOTAL DE LA VENTA
     */
    private function recalcularTotal($ventaId)
    {
        $total = DetalleVenta::where('venta_id', $ventaId)
            ->sum('subtotal');

        Venta::where('id', $ventaId)->update([
            'total' => $total
        ]);
    }
}