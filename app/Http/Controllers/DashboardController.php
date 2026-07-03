<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard con productos, categorías y cliente consumidor final.
     */
    public function index()
    {
        $productos = Producto::with('categoria')
            ->orderBy('nombre')
            ->get();

        $categorias = Categoria::orderBy('nombre')->get();

        $clientes = Cliente::orderBy('nombre')->get();

        $clienteConsumidorFinal = Cliente::where('consumidor_final', true)->first();

        return view('dashboard', compact(
            'productos',
            'categorias',
            'clientes',
            'clienteConsumidorFinal'
        ));
    }
}
