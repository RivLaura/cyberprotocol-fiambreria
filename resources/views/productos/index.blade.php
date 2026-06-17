<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Listado de Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                <th class="p-3">Producto</th>
                                <th class="p-3">Categoría</th>
                                <th class="p-3 text-right">Precio</th>
                                <th class="p-3 text-center">Stock</th>
                                <th class="p-3 text-center">Vencimiento</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($productos as $producto)
                                <tr class="text-sm text-gray-900 dark:text-gray-100">
                                    <td class="p-3 font-medium">{{ $producto->nombre }}</td>
                                    <td class="p-3">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                                    <td class="p-3 text-right font-mono">${{ number_format($producto->precio, 2) }}</td>
                                    <td class="p-3 text-center">{{ $producto->stock }} u.</td>
                                    <td class="p-3 text-center">
                                        {{ $producto->fecha_vencimiento ? \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') : 'No vence' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-gray-400 dark:text-gray-500">
                                        No hay productos registrados en el inventario.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (method_exists($productos, 'links'))
                    <div class="mt-4">
                        {{ $productos->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>