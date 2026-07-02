<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Mostrar formulario de nueva venta (POS)
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();

        $consumidorFinal = Cliente::where('consumidor_final', true)->first();

        // Cliente por defecto seleccionado
        $clienteSeleccionado = $consumidorFinal;

        return view('ventas.create', compact(
            'clientes',
            'consumidorFinal',
            'clienteSeleccionado'
        ));
    }

    /**
     * Guardar nueva venta
     */
    public function store(Request $request)
    {
        $cliente = Cliente::find($request->cliente_id);

        // fallback seguro a consumidor final
        if (!$cliente) {
            $cliente = Cliente::where('consumidor_final', true)->first();
        }

        $venta = Venta::create([
            'cliente_id' => $cliente?->id,
            'total' => $request->total ?? 0,
        ]);

        return redirect()
            ->route('ventas.create')
            ->with('success', 'Venta creada correctamente');
    }
}