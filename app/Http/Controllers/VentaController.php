<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();

        $consumidorFinal = Cliente::where('consumidor_final', true)->first();

        return view('ventas.create', compact('clientes', 'consumidorFinal'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'total' => 'required|numeric|min:0',
        ]);

        // Obtener cliente seleccionado
        $cliente = Cliente::find($request->cliente_id);

        // Si no se seleccionó un cliente, usar Consumidor Final
        if (!$cliente) {
            $cliente = Cliente::where('consumidor_final', true)->first();
        }

        // Registrar la venta
        Venta::create([
            'cliente_id' => $cliente?->id,
            'total' => $request->total,
        ]);

        return redirect()
            ->route('ventas.create')
            ->with('success', 'Venta procesada correctamente.');
    }
}