<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <x-app-layout>

        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">
                    Historial de Ventas
                </h2>

                <a href="{{ route('ventas.create') }}"
                    class="bg-amber-700 hover:bg-amber-800 text-white px-5 py-2 rounded-lg shadow">
                    Nueva Venta
                </a>
            </div>
        </x-slot>

        <div class="py-8">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white rounded-xl shadow">

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="bg-gray-100">

                                <tr>

                                    <th class="px-6 py-4 text-left">ID</th>

                                    <th class="px-6 py-4 text-left">Fecha</th>

                                    <th class="px-6 py-4 text-left">Cliente</th>

                                    <th class="px-6 py-4 text-right">Total</th>

                                    <th class="px-6 py-4 text-center">Acciones</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($ventas as $venta)

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="px-6 py-4">

                                        {{ $venta->id }}

                                    </td>

                                    <td class="px-6 py-4">

                                        {{ $venta->created_at->format('d/m/Y H:i') }}

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($venta->cliente)
                                            {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}
                                        @else
                                            Consumidor Final
                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-right font-semibold">

                                        ${{ number_format($venta->total,2,',','.') }}

                                    </td>

                                    <td class="px-6 py-4 text-center">

                                        <button
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                                            Ver detalle

                                        </button>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="5"
                                        class="py-10 text-center text-gray-500">

                                        No existen ventas registradas.

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="p-5">

                        {{ $ventas->links() }}

                    </div>

                </div>

            </div>

        </div>

    </x-app-layout>
</body>

</html>