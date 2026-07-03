<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Detalle de Venta #') . $venta->id }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Productos vendidos en esta operación.</p>
            </div>
            <a href="{{ route('ventas.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Volver al listado') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md mb-8">
                <div class="p-6">
                    <h3 class="font-serif text-lg font-bold text-amber-950 mb-4">Información de la venta</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <span class="block text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Cliente</span>
                            <span class="text-base font-serif font-bold text-gray-900">
                                {{ $venta->cliente->nombre ?? 'Sin cliente' }} {{ $venta->cliente->apellido ?? '' }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Total</span>
                            <span class="text-2xl font-mono font-bold text-amber-950">
                                ${{ number_format($venta->total, 2) }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Fecha</span>
                            <span class="text-base font-mono font-bold text-gray-900">
                                {{ $venta->created_at->format('d/m/Y H:i') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">

                <div class="p-6">
                    <h3 class="font-serif text-lg font-bold text-amber-950 mb-6">Productos vendidos</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Producto</th>
                                    <th class="px-6 py-3 text-center text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Cantidad</th>
                                    <th class="px-6 py-3 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Precio Unitario</th>
                                    <th class="px-6 py-3 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse($venta->detalle_ventas as $detalle)
                                <tr class="hover:bg-amber-50/40 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-amber-100 text-amber-900 font-serif font-bold rounded-lg flex items-center justify-center text-xs border border-amber-200/50 mr-3">
                                                {{ Str::substr($detalle->producto->nombre, 0, 1) }}
                                            </div>
                                            <span class="text-sm font-serif font-bold text-gray-900">
                                                {{ $detalle->producto->nombre }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-sm font-mono font-bold text-gray-900">{{ $detalle->cantidad }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="text-sm font-mono text-gray-700">${{ number_format($detalle->precio_unitario, 2) }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="text-sm font-mono font-bold text-gray-900">${{ number_format($detalle->subtotal, 2) }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10 text-gray-500">
                                        No hay productos registrados en esta venta.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                                <tr>
                                    <td colspan="3" class="text-right font-bold px-6 py-4 text-sm font-serif uppercase tracking-wider text-amber-950">
                                        TOTAL
                                    </td>
                                    <td class="text-right font-bold px-6 py-4">
                                        <span class="text-lg font-mono font-bold text-amber-950">${{ number_format($venta->total, 2) }}</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>