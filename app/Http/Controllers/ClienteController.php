<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Muestra un listado de los recursos.
     */
    public function index(Request $request)
    {
        $buscar = trim($request->input('buscar', ''));

        $buscar = str($buscar)
            ->ascii()
            ->lower()
            ->toString();

        $clientes = Cliente::query()
            ->when($buscar, function ($query) use ($buscar) {
                $query->where('nombre', 'like', "%{$buscar}%")
                    ->orWhere('apellido', 'like', "%{$buscar}%")
                    ->orWhere('telefono', 'like', "%{$buscar}%")
                    ->orWhere('email', 'like', "%{$buscar}%");
            })
            ->orderBy('nombre', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Almacena un nuevo recurso en la base de datos.
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create($request->validated());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(ClienteRequest $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->validated());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->ventas()->exists()) {
            return redirect()
                ->route('clientes.index')
                ->with('error', 'No se puede eliminar un cliente que posee ventas registradas.');
        }

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
