<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Detalle de Venta #') }}{{ $venta->id }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Informacion completa de la venta.</p>
            </div>
            <a href="{{ route('ventas.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-white/10 hover:bg-white/20 text-amber-50 text-sm font-bold rounded-lg border border-amber-400/30 shadow-md hover:shadow-amber-500/10 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Volver al historial') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md p-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-amber-50/50 rounded-xl p-4 border border-amber-100">
                        <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Cliente</p>
                        <p class="font-serif font-bold text-gray-900">{{ $venta->cliente?->nombre_completo ?? 'Consumidor Final' }}</p>
                    </div>
                    <div class="bg-amber-50/50 rounded-xl p-4 border border-amber-100">
                        <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Fecha</p>
                        <p class="font-serif font-bold text-gray-900">{{ $venta->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="bg-amber-50/50 rounded-xl p-4 border border-amber-100">
                        <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Total</p>
                        <p class="text-2xl font-mono font-bold text-amber-700">${{ number_format($venta->total,2,',','.') }}</p>
                    </div>
                </div>

                <h3 class="font-serif text-lg font-bold text-amber-950 mb-4">Productos vendidos</h3>

                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-amber-100">
                        <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Producto</th>
                                <th class="px-6 py-4 text-center text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Cantidad</th>
                                <th class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Precio Unitario</th>
                                <th class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach($venta->detalle_ventas as $detalle)
                            <tr class="hover:bg-amber-50/40 transition-all duration-200">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $detalle->producto->nombre }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-700">{{ $detalle->cantidad }}</td>
                                <td class="px-6 py-4 text-right text-sm font-mono text-gray-700">${{ number_format($detalle->precio_unitario,2,',','.') }}</td>
                                <td class="px-6 py-4 text-right text-sm font-mono font-bold text-gray-900">${{ number_format($detalle->subtotal,2,',','.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gradient-to-r from-gray-50 to-amber-50/30">
                            <tr>
                                <td colspan="3" class="text-right font-bold px-6 py-4 text-amber-950 font-serif">TOTAL</td>
                                <td class="text-right font-bold px-6 py-4 text-lg font-mono text-amber-700">${{ number_format($venta->total,2,',','.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-8 flex justify-end">
                    <a href="{{ route('ventas.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al historial
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>

