
    @props(['producto'])

    @php

    $iconos = [
    'Fiambres' => '🥓',
    'Quesos' => '🧀',
    'Embutidos' => '🌭',
    'Bebidas' => '🥤',
    ];

    $icono = $iconos[$producto->categoria->nombre] ?? '📦';

    $stockBajo = $producto->stock <= $producto->stock_minimo;

        $unidad = match ($producto->categoria->nombre) {
        'Bebidas' => '/ unidad',
        default => '/ kg',
        };

        @endphp

        <div
            class="bg-white rounded-2xl border border-stone-200 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

            <!-- Encabezado -->
            <div
                class="h-36 bg-gradient-to-br from-amber-100 to-amber-50 flex items-center justify-center">

                <span class="text-6xl">

                    {{ $icono }}

                </span>

            </div>

            <!-- Contenido -->

            <div class="p-5">

                <h3 class="text-lg font-bold text-stone-800">

                    {{ $producto->nombre }}

                </h3>

                <p class="text-sm text-stone-500">

                    {{ $producto->categoria->nombre }}

                </p>

                <div class="mt-5 space-y-3">

                    <div class="flex justify-between">

                        <span class="text-stone-500">
                            Precio
                        </span>

                        <span class="font-bold text-amber-700">

                            $ {{ number_format($producto->precio,0,',','.') }}
                            {{ $unidad }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-stone-500">
                            Stock
                        </span>

                        <span class="font-semibold">

                            {{ $producto->stock }}

                        </span>

                    </div>

                </div>

                @if($stockBajo)

                <div
                    class="mt-5 bg-red-50 text-red-700 text-sm rounded-lg px-3 py-2 flex items-center gap-2">

                    🔴 Stock Bajo

                </div>

                @else

                <div
                    class="mt-5 bg-green-50 text-green-700 text-sm rounded-lg px-3 py-2 flex items-center gap-2">

                    🟢 Disponible

                </div>

                @endif

                <button
                    type="button"
                    @click="
                    mostrarModal = true;

                    producto = {
                        id: {{ $producto->id }},
                        nombre: '{{ $producto->nombre }}',
                        precio: {{ $producto->precio }},
                        categoria: '{{ $producto->categoria->nombre }}'
                    };
                "
                    class="mt-6 w-full rounded-xl bg-amber-700 hover:bg-amber-800 text-white py-3">

                    🛒 Agregar

                </button>
            </div>

        </div>