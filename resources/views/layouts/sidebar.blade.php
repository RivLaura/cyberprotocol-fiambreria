<aside class="fixed left-0 top-16 bottom-0 w-56 bg-gradient-to-b from-amber-900 to-stone-800 shadow-lg z-30 flex flex-col">

    <nav class="mt-8 flex-1">

        <ul class="space-y-1 px-3">

            <li>
                <a href="{{ url('/') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 text-amber-100/80 hover:bg-amber-700/50 hover:text-white">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M3 12L12 3l9 9M5 10v10h14V10" />
                    </svg>

                    Inicio
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 @if(request()->routeIs('dashboard')) bg-amber-700 text-white shadow-md @else text-amber-100/80 hover:bg-amber-700/50 hover:text-white @endif">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Panel
                </a>
            </li>

            <li>
                <a href="{{ route('categorias.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 @if(request()->routeIs('categorias.*')) bg-amber-700 text-white shadow-md @else text-amber-100/80 hover:bg-amber-700/50 hover:text-white @endif">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    Categorías
                </a>
            </li>

            <li>
                <a href="{{ route('productos.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 @if(request()->routeIs('productos.*')) bg-amber-700 text-white shadow-md @else text-amber-100/80 hover:bg-amber-700/50 hover:text-white @endif">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Productos
                </a>
            </li>

            <li>
                <a href="{{ route('clientes.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 @if(request()->routeIs('clientes.*')) bg-amber-700 text-white shadow-md @else text-amber-100/80 hover:bg-amber-700/50 hover:text-white @endif">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Clientes
                </a>
            </li>

            <li>
                <a href="{{ route('ventas.index') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-bold transition-all duration-200 @if(request()->routeIs('ventas.*')) bg-amber-700 text-white shadow-md @else text-amber-100/80 hover:bg-amber-700/50 hover:text-white @endif">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Ventas
                </a>
            </li>

        </ul>

    </nav>

    {{-- Cotización del dólar --}}
    @isset($dolar)

    <div class="mx-3 mt-20 mb-4 rounded-xl border border-amber-700/40 bg-amber-950/40 p-4 shadow-lg">

        <div class="flex items-center gap-2 mb-3">

            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-12V4m0 16v-1" />
            </svg>

            <span class="text-xs font-bold uppercase tracking-wider text-amber-300">
                Dólar Oficial
            </span>

        </div>

        <div class="space-y-2 text-sm">

            <div class="flex justify-between">
                <span class="text-amber-100/70">Compra</span>
                <span class="font-bold text-white">
                    $ {{ number_format($dolar['compra'], 2, ',', '.') }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-amber-100/70">Venta</span>
                <span class="font-bold text-green-400">
                    $ {{ number_format($dolar['venta'], 2, ',', '.') }}
                </span>
            </div>

            <p class="mt-3 text-[10px] text-center text-amber-200/60">
                Actualizado:
                {{ \Carbon\Carbon::parse($dolar['fechaActualizacion'])
                    ->setTimezone('America/Argentina/Cordoba')
                    ->format('d/m/Y H:i') }}
            </p>
        </div>

    </div>

    @endif
</aside>