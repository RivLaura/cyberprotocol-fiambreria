<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Muestra una lista de las categorías.
     */
    public function index()
{
    $categorias = Categoria::all();

    return view('categorias.index', compact('categorias'));
}

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Almacena una categoría recién creada en la base de datos.
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Muestra la categoría especificada.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra el formulario para editar la categoría especificada.
     */
   public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualiza la categoría especificada en la base de datos.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Elimina la categoría especificada de la base de datos.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}