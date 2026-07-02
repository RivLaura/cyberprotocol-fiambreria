<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Carrito de Compras
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg">

                <div class="p-6">

                    <h3 class="text-lg font-bold mb-6">
                        Productos seleccionados
                    </h3>

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-100">

                                <tr>

                                    <th class="px-6 py-3 text-left">
                                        Producto
                                    </th>

                                    <th class="px-6 py-3 text-center">
                                        Cantidad
                                    </th>

                                    <th class="px-6 py-3 text-right">
                                        Precio Unitario
                                    </th>

                                    <th class="px-6 py-3 text-right">
                                        Subtotal
                                    </th>

                                    <th class="px-6 py-3 text-center">
                                        Acción
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @forelse($detalles ?? [] as $detalle)

                                    <tr>

                                        <td class="px-6 py-4">
                                            {{ $detalle->producto->nombre }}
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            {{ $detalle->cantidad }}
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            ${{ number_format($detalle->precio_unitario,2) }}
                                        </td>

                                        <td class="px-6 py-4 text-right font-semibold">
                                            ${{ number_format($detalle->subtotal,2) }}
                                        </td>

                                        <td class="px-6 py-4 text-center">

                                            <button
                                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">

                                                Eliminar

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="text-center py-10 text-gray-500">

                                            No hay productos agregados al carrito.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                            <tfoot class="bg-gray-100">

                                <tr>

                                    <td colspan="3"
                                        class="text-right font-bold px-6 py-4">

                                        TOTAL

                                    </td>

                                    <td class="text-right font-bold px-6 py-4">

                                        ${{ number_format($total ?? 0,2) }}

                                    </td>

                                    <td></td>

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                    <div class="mt-6 flex justify-end">

                        <button
                            class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">

                            Finalizar Venta

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>