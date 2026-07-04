<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Carrito de Compras') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Revisa los productos seleccionados antes de finalizar la venta.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">
                <div class="p-6">

                    <h3 class="font-serif text-lg font-bold text-amber-950 mb-6">Productos seleccionados</h3>

                    <div class="overflow-x-auto">

                        <table class="w-full divide-y divide-amber-100">
                            <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Producto</th>
                                    <th class="px-6 py-4 text-center text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Cantidad</th>
                                    <th class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Precio Unitario</th>
                                    <th class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Subtotal</th>
                                    <th class="px-6 py-4 text-center text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse($detalles ?? [] as $detalle)
                                <tr class="hover:bg-amber-50/40 transition-all duration-200">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $detalle->producto->nombre }}</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $detalle->cantidad }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-mono text-gray-700">${{ number_format($detalle->precio_unitario,2) }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-mono font-bold text-gray-900">${{ number_format($detalle->subtotal,2) }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <button class="inline-flex items-center justify-center px-3 py-1.5 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded-xl shadow-sm hover:shadow-red-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-16">
                                        <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-3 border border-amber-100">
                                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" /></svg>
                                        </div>
                                        <p class="text-sm text-gray-500 font-medium">No hay productos agregados al carrito.</p>
                                        <p class="text-xs text-gray-400 mt-1">Selecciona productos desde el catalogo para agregarlos aqui.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                                <tr>
                                    <td colspan="3" class="text-right font-bold px-6 py-4 text-amber-950 font-serif">TOTAL</td>
                                    <td class="text-right font-bold px-6 py-4 text-lg font-mono text-amber-700">${{ number_format($total ?? 0,2) }}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                    <div class="mt-6 flex justify-end">
                        <button class="inline-flex items-center justify-center px-6 py-3 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            Finalizar Venta
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
