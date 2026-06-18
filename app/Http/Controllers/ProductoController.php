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
    // 1. Buscamos todos los productos con su categoría
    $productos = Producto::with('categoria')->get();

    // 2. Buscamos los productos cuyo stock es menor o igual al stock_minimo configurado
    $productosStockBajo = Producto::whereRaw('stock <= stock_minimo', [], 'and')->get();

    // 3. Enviamos ambas variables a la vista de productos
    return view('productos.index', compact('productos', 'productosStockBajo'));
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
