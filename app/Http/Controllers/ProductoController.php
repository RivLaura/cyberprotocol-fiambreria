<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->get();

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $categorias = Categoria::all();

    return view('productos.create', compact('categorias'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(ProductoRequest $request)
{
    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'stock_minimo' => $request->stock_minimo,
        'fecha_elaboracion' => $request->fecha_elaboracion,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'categoria_id' => $request->categoria_id,
    ]);

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
{
    $producto = Producto::findOrFail($id);

    $categorias = Categoria::all();

    return view('productos.edit', compact('producto', 'categorias'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(ProductoRequest $request, string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'stock_minimo' => $request->stock_minimo,
        'fecha_elaboracion' => $request->fecha_elaboracion,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'categoria_id' => $request->categoria_id,
    ]);

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->delete();

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto eliminado correctamente.');
}
}
