@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navegación de páginas" class="flex gap-2 items-center justify-between">

        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-400 bg-amber-50/60 border border-amber-200 cursor-not-allowed leading-5 rounded-xl">
                Anterior
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-950 bg-white border border-amber-100 leading-5 rounded-xl hover:bg-amber-50 hover:text-amber-900 focus:outline-none focus:ring ring-amber-500/50 active:bg-amber-100 transition ease-in-out duration-150">
                Anterior
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-950 bg-white border border-amber-100 leading-5 rounded-xl hover:bg-amber-50 hover:text-amber-900 focus:outline-none focus:ring ring-amber-500/50 active:bg-amber-100 transition ease-in-out duration-150">
                Siguiente
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-400 bg-amber-50/60 border border-amber-200 cursor-not-allowed leading-5 rounded-xl">
                Siguiente
            </span>
        @endif

    </nav>
@endif
