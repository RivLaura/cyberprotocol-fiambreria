<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Historial de Ventas') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Consulta todas las ventas realizadas y sus detalles.</p>
            </div>
            <a href="{{ route('ventas.export.excel') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold rounded-lg shadow-md hover:shadow-emerald-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Exportar Excel
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="max-w-7xl mx-auto mb-6 px-4 sm:px-6 lg:px-8">
                <div class="p-4 bg-orange-100 border-l-4 border-orange-500 text-amber-950 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                    <svg class="w-5 h-5 mr-3 text-orange-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">

                @forelse($ventas as $venta)
                @if ($loop->first)
                <table class="w-full divide-y divide-amber-100 block md:table table-fixed md:table-auto">
                    <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30 hidden md:table-header-group">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">ID</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Fecha</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Cliente</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Total</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white block md:table-row-group">
                        @endif

                        <tr class="group flex flex-col md:table-row mb-5 md:mb-0 border-t-4 border-amber-600 md:border-t-0 border-b border-amber-100/60 md:border-b-0 bg-white md:bg-transparent rounded-2xl md:rounded-none m-4 md:m-0 shadow-sm md:shadow-none hover:shadow-md md:hover:shadow-none md:hover:bg-amber-50/40 transition-all duration-200 overflow-hidden">

                            <td class="px-5 pt-5 pb-3 md:px-6 md:py-4 whitespace-nowrap md:align-middle block md:table-cell">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-amber-100 text-amber-900 font-serif font-bold rounded-xl flex items-center justify-center text-sm border border-amber-200/50 mr-3 shrink-0 group-hover:scale-105 group-hover:bg-amber-200 transition-all duration-200">

                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-base md:text-sm font-serif font-bold text-gray-900 leading-tight">
                                            #{{ $venta->id }}
                                        </div>
                                        <div class="md:hidden text-xs text-gray-400 mt-0.5">
                                            {{ $venta->created_at->format('d/m/Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap md:align-middle text-sm text-gray-600 hidden md:table-cell">

                                {{ $venta->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell border-t border-gray-50 md:border-t-0 w-1/2 md:w-auto">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-0.5">Cliente</span>
                                @if($venta->cliente)
                                <div class="flex items-center gap-1.5">
                                    <div class="w-6 h-6 bg-amber-100 text-amber-800 font-bold rounded-lg flex items-center justify-center text-[10px] border border-amber-200/50 shrink-0 capitalize">
                                        {{ Str::substr($venta->cliente->nombre, 0, 1) }}{{ Str::substr($venta->cliente->apellido, 0, 1) }}
                                    </div>
                                    <span class="text-sm text-gray-700 font-medium">{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</span>
                                </div>
                                @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                    Consumidor Final
                                </span>
                                @endif
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell border-t border-gray-50 md:border-t-0 w-1/2 md:w-auto">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-0.5">Total</span>
                                <span class="text-base md:text-sm font-mono font-bold text-amber-700">${{ number_format($venta->total,2,',','.') }}</span>
                            </td>

                            <td class="px-5 py-3 md:px-6 md:py-4 whitespace-nowrap text-xs font-medium md:align-middle bg-gray-50/50 md:bg-transparent flex md:table-cell justify-between border-t border-gray-100 md:border-t-0">
                                <div class="flex items-center space-x-2 w-full md:w-auto justify-end">
                                    <a href="{{ route('ventas.show', $venta) }}" class="inline-flex items-center justify-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 text-xs font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Ver detalle
                                    </a>
                                </div>
                            </td>

                        </tr>

                        @if ($loop->last)
                    </tbody>
                </table>
                @endif
                @empty
                <div class="bg-white rounded-2xl p-10 md:p-16 text-center border-2 border-dashed border-amber-200 shadow-inner m-4">
                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h18v18H3V3z" /></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-amber-950">No hay ventas registradas</h3>
                    <p class="mt-2 text-sm text-amber-800/60 max-w-sm mx-auto italic">Las ventas apareceran aqui una vez que se procesen desde el panel principal.</p>
                </div>
                @endforelse

                @if($ventas->hasPages())
                <div class="p-5 border-t border-amber-100">
                    {{ $ventas->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

