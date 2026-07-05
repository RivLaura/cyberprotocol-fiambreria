<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use App\Services\DolarService;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard con productos, categorías y cliente consumidor final.
     */
    public function index(DolarService $dolarService)
    {
        $productos = Producto::with('categoria')
            ->orderBy('nombre')
            ->paginate(12);
            
        $categorias = Categoria::orderBy('nombre')->get();

        $clientes = Cliente::orderBy('nombre')->get();

        $clienteConsumidorFinal = Cliente::where('consumidor_final', true)->first();

        $carrito = session('carrito', []);

        $total = collect($carrito)->sum('subtotal');

        $dolar = $dolarService->obtenerCotizacion();

        return view('dashboard', compact(
            'productos',
            'categorias',
            'clientes',
            'clienteConsumidorFinal',
            'carrito',
            'total',
            'dolar'
        ));
    }
}
