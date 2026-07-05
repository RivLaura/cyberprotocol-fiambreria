<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Muestra una lista de productos con su categoría y resalta aquellos con stock bajo.
     */
    public function index(Request $request)
    {
        $buscar = trim($request->input('buscar', ''));

        $buscar = str($buscar)
            ->ascii()
            ->lower()
            ->toString();

        $productos = Producto::with('categoria')

            ->when($buscar, function ($query) use ($buscar) {

                $query->where(function ($q) use ($buscar) {

                    $q->where('nombre', 'like', "%{$buscar}%")
                        ->orWhereHas('categoria', function ($categoria) use ($buscar) {

                            $categoria->where('nombre', 'like', "%{$buscar}%");
                        });
                });
            })

            ->orderBy('nombre')

            ->paginate(10)

            ->withQueryString();

        $categorias = Categoria::all();

        return view('productos.index', compact('productos', 'buscar', 'categorias'));
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
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create($data);

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
    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('productos.edit', compact(
            'producto',
            'categorias'
        ));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {

            if (
                $producto->imagen &&
                Storage::disk('public')->exists($producto->imagen)
            ) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $data['imagen'] = $request
                ->file('imagen')
                ->store('productos', 'public');
        } else {

            unset($data['imagen']);
        }

        $producto->update($data);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Producto $producto)
    {
        if (
            $producto->imagen &&
            Storage::disk('public')->exists($producto->imagen)
        ) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
