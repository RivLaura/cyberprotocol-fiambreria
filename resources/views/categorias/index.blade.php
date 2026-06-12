<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorías
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">

                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">
                        Listado de Categorías
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Descripción
                                    </th>

                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>

                            
                        <tbody class="bg-white divide-y divide-gray-200">

                                @forelse ($categorias as $categoria)
                                <tr>

                                    <td class="px-6 py-4">
                                        {{ $categoria->nombre }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $categoria->descripcion }}
                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <button
                                            class="bg-blue-500 text-white px-3 py-1 rounded text-sm"
                                            disabled>
                                            Ver
                                        </button>

                                        <button
                                            class="bg-yellow-500 text-white px-3 py-1 rounded text-sm"
                                            disabled>
                                            Editar
                                        </button>

                                        <button
                                            class="bg-red-500 text-white px-3 py-1 rounded text-sm"
                                            disabled>
                                            Eliminar
                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        No existen categorías registradas.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>