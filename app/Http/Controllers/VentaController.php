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
        $clienteId = $request->cliente_id;

        // fallback seguro
        if (!$clienteId) {
            $clienteId = Cliente::where('consumidor_final', true)->value('id');
        }

        $venta = Venta::create([
            'cliente_id' => $clienteId,
            'total' => $request->total ?? 0,
        ]);

        return redirect()->route('ventas.create')
            ->with('success', 'Venta creada correctamente');
    }
}