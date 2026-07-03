<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Muestra una lista de productos con su categoría y resalta aquellos con stock bajo.
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
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('productos.create', compact('categorias'));
    }

    /**
     * Almacena un nuevo producto en la base de datos.
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
     * Muestra el detalle de un producto específico.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra el formulario para editar un producto específico.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);

        $categorias = Categoria::all();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
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
     * Elimina el recurso especificado del almacenamiento.
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
