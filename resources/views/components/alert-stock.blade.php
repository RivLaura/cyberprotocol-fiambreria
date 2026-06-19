@props(['productos'])

@if($productos->count() > 0)
    <div class="mb-6 p-4 bg-orange-100 dark:bg-orange-900 border-l-4 border-orange-500 text-orange-700 dark:text-orange-200 rounded-r-lg shadow-sm">
        <div class="flex items-center mb-2">
            <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <h3 class="font-bold text-base">Alerta: ¡Productos con Stock Bajo o Crítico!</h3>
        </div>
        <ul class="list-disc pl-5 text-sm space-y-1">
            @foreach($productos as $prod)
                <li>
                    El producto <span class="font-semibold text-gray-900 dark:text-white">{{ $prod->nombre }}</span> tiene solo <span class="font-bold text-red-600 dark:text-red-400">{{ $prod->stock }} unidades</span> disponibles (Mínimo requerido: {{ $prod->stock_minimo }} u.).
                </li>
            @endforeach
        </ul>
    </div>
@endif