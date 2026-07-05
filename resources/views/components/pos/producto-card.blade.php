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
        class="bg-white rounded-2xl border border-amber-100 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">

        <div
            class="aspect-[4/3] bg-gradient-to-br from-amber-100 to-amber-50 flex items-center justify-center shrink-0 overflow-hidden">
            @if($producto->imagen_url)
            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-24 h-24 object-contain rounded-xl bg-stone-50 p-2">
            @else
            <div class="flex flex-col items-center gap-1">
                <span class="text-5xl">{{ $icono }}</span>
                <span class="text-[10px] font-sans font-bold tracking-wider text-amber-500/60 uppercase">Sin imagen</span>
            </div>
            @endif
        </div>

        <div class="p-5 flex flex-col flex-1 gap-4">

            <div class="flex flex-col gap-4">

                <div>
                    <h3 class="font-serif text-lg font-bold text-gray-900 leading-tight">
                        {{ $producto->nombre }}
                    </h3>
                    <p class="text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase mt-1">
                        {{ $producto->categoria->nombre }}
                    </p>
                </div>

                <div class="space-y-3 bg-amber-50/30 rounded-xl p-4 border border-amber-100/50">
                    <div class="flex justify-between items-baseline">
                        <span class="text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase">Precio</span>
                        <div class="text-right">
                            <span class="font-mono text-xl font-bold text-amber-700 leading-none">
                                ${{ number_format($producto->precio,0,',','.') }}
                            </span>
                            <span class="block text-[10px] font-sans font-bold tracking-wider text-amber-500/70 uppercase mt-0.5">{{ $unidad }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-baseline">
                        <span class="text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase">Stock</span>
                        <div class="text-right">
                            <span class="font-mono text-base font-semibold text-gray-900 leading-none">
                                {{ $producto->stock }}
                            </span>
                            <span class="block text-[10px] font-sans font-bold tracking-wider text-amber-500/70 uppercase mt-0.5">
                                {{ $producto->categoria->nombre == 'Bebidas' ? 'unidades' : 'gramos' }}
                            </span>
                        </div>
                    </div>
                </div>

                @if($stockBajo)
                <div class="bg-red-50 text-red-700 text-xs font-bold rounded-xl px-3 py-2.5 flex items-center gap-2 border border-red-200">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Stock Bajo
                </div>
                @else
                <div class="bg-green-50 text-green-700 text-xs font-bold rounded-xl px-3 py-2.5 flex items-center gap-2 border border-green-200">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Disponible
                </div>
                @endif

            </div>

            <button
                type="button"
                @click="
                    mostrarModal = true;

                    producto = {
                        id: {{ $producto->id }},
                        nombre: '{{ $producto->nombre }}',
                        precio: {{ $producto->precio }},
                        categoria: '{{ $producto->categoria->nombre }}',
                        stock: {{ $producto->stock }}
                    };
                "
                class="mt-auto w-full inline-flex items-center justify-center px-5 py-2.5 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">

                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Agregar

            </button>

        </div>

    </div>
