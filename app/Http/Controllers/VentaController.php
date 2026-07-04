<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Mostrar historial de ventas
     */
    public function index()
    {
        $ventas = Venta::with('cliente')
            ->latest()
            ->paginate(10);

        return view('ventas.index', compact('ventas'));
    }

    /**
     * Mostrar el detalle de una venta
     */
    public function show(Venta $venta)
    {
        $venta->load([
            'cliente',
            'detalle_ventas.producto'
        ]);

        return view('ventas.show', compact('venta'));
    }

    /**
     * Mostrar formulario de nueva venta (POS)
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();

        $consumidorFinal = Cliente::where('consumidor_final', true)->first();

        $clienteSeleccionado = $consumidorFinal;

        return view('ventas.create', compact(
            'clientes',
            'consumidorFinal',
            'clienteSeleccionado'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'total' => 'required|numeric|min:0',
        ]);

        $cliente = Cliente::find($request->cliente_id);

        if (!$cliente) {
            $cliente = Cliente::where('consumidor_final', true)->first();
        }

        Venta::create([
            'cliente_id' => $cliente?->id,
            'total' => $request->total,
        ]);

        return redirect()
            ->route('ventas.create')
            ->with('success', 'Venta procesada correctamente.');
    }
}
