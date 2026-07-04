<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Venta #{{ $venta->id }}
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                    <div>

                        <p class="text-sm text-gray-500">
                            Cliente
                        </p>

                        <p class="font-semibold">
                            {{ $venta->cliente?->nombre_completo ?? 'Consumidor Final' }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">
                            Fecha
                        </p>

                        <p class="font-semibold">
                            {{ $venta->created_at->format('d/m/Y H:i') }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">
                            Total
                        </p>

                        <p class="text-2xl font-bold text-amber-700">
                            $ {{ number_format($venta->total,2,',','.') }}
                        </p>

                    </div>

                </div>

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

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @foreach($venta->detalle_ventas as $detalle)

                                <tr>

                                    <td class="px-6 py-4">

                                        {{ $detalle->producto->nombre }}

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        {{ $detalle->cantidad }}

                                    </td>

                                    <td class="px-6 py-4 text-right">

                                        $ {{ number_format($detalle->precio_unitario,2,',','.') }}

                                    </td>

                                    <td class="px-6 py-4 text-right font-semibold">

                                        $ {{ number_format($detalle->subtotal,2,',','.') }}

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="mt-8 flex justify-end">

                    <a
                        href="{{ route('ventas.index') }}"
                        class="px-5 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">

                        Volver

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>