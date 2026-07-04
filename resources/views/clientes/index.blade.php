<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">
                        Listado de clientes
                    </h3>

                    <a href="{{ route('clientes.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Nuevo Cliente
                    </a>
                </div>

                @if(session('success'))

                <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

                    {{ session('success') }}

                </div>

                @endif

                @if(session('error'))

                <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

                    {{ session('error') }}

                </div>

                @endif

                {{-- Buscador --}}
                <div class="mb-6">
                    <input
                        type="text"
                        placeholder="Buscar cliente..."
                        disabled
                        class="w-full rounded-md border-gray-300 bg-gray-100 text-gray-500 cursor-not-allowed">
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase">
                                    Nombre
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-bold uppercase">
                                    Apellido
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-bold uppercase">
                                    Teléfono
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-bold uppercase">
                                    Correo electrónico
                                </th>

                                <th class="px-6 py-3 text-center text-xs font-bold uppercase">
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">

                            @forelse ($clientes as $cliente)
                            <tr>

                                <td class="px-6 py-4">
                                    {{ $cliente->nombre }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $cliente->apellido }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $cliente->telefono ?? '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $cliente->email ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('clientes.edit', $cliente->id) }}"
                                            class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">

                                            Editar

                                        </a>

                                        <form
                                            action="{{ route('clientes.destroy', $cliente->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Está seguro que desea eliminar este cliente?');">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">

                                                Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                    No hay clientes registrados.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                <div class="mt-6">
                    {{ $clientes->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>