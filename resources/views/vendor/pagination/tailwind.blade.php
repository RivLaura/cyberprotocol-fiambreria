@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navegación de páginas">

        {{-- Vista movil --}}
        <div class="flex gap-2 items-center justify-between sm:hidden">
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
        </div>

        {{-- Vista de escritorio --}}
        <div class="hidden sm:flex sm:flex-1 sm:gap-2 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-amber-950/70 leading-5">
                    Mostrando
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-amber-950">{{ $paginator->firstItem() }}</span>
                        a
                        <span class="font-semibold text-amber-950">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    de
                    <span class="font-semibold text-amber-950">{{ $paginator->total() }}</span>
                    resultados
                </p>
            </div>

            <div class="inline-flex items-center gap-1.5 bg-amber-50/40 border border-amber-100 rounded-2xl px-3 py-2 shadow-sm">
                {{-- Enlace de pagina anterior --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="Anterior">
                            <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-300 bg-white border border-amber-200 cursor-not-allowed rounded-xl leading-5 shadow-sm" aria-hidden="true">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150" aria-label="Anterior">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Elementos de paginacion --}}
                @foreach ($elements as $element)
                    {{-- Separador de puntos suspensivos --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-400 bg-transparent cursor-default rounded-xl leading-5">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array de enlaces --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2.5 text-sm font-bold text-white bg-gradient-to-b from-amber-700 to-amber-900 border border-amber-800 cursor-default rounded-xl leading-5 shadow-md">{{ $page }}</span>
                                </span>
                            @else
                                <a href="{{ $url }}" class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2.5 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150" aria-label="Ir a la página {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Enlace de pagina siguiente --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150" aria-label="Siguiente">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="Siguiente">
                        <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-300 bg-white border border-amber-200 cursor-not-allowed rounded-xl leading-5 shadow-sm" aria-hidden="true">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif
