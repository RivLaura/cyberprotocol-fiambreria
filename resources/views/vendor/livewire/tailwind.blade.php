@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Navegación de páginas">

            {{-- Vista móvil --}}
            <div class="flex gap-2 items-center justify-between sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-400 bg-amber-50/60 border border-amber-200 cursor-not-allowed leading-5 rounded-xl">
                            Anterior
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-950 bg-white border border-amber-100 leading-5 rounded-xl hover:bg-amber-50 hover:text-amber-900 focus:outline-none focus:ring ring-amber-500/50 active:bg-amber-100 transition ease-in-out duration-150 cursor-pointer">
                            Anterior
                        </button>
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-950 bg-white border border-amber-100 leading-5 rounded-xl hover:bg-amber-50 hover:text-amber-900 focus:outline-none focus:ring ring-amber-500/50 active:bg-amber-100 transition ease-in-out duration-150 cursor-pointer">
                            Siguiente
                        </button>
                    @else
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-amber-400 bg-amber-50/60 border border-amber-200 cursor-not-allowed leading-5 rounded-xl">
                            Siguiente
                        </span>
                    @endif
                </span>
            </div>

            {{-- Vista de escritorio --}}
            <div class="hidden sm:flex sm:flex-1 sm:gap-2 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-amber-950/70 leading-5">
                        Mostrando
                        <span class="font-semibold text-amber-950">{{ $paginator->firstItem() }}</span>
                        a
                        <span class="font-semibold text-amber-950">{{ $paginator->lastItem() }}</span>
                        de
                        <span class="font-semibold text-amber-950">{{ $paginator->total() }}</span>
                        resultados
                    </p>
                </div>

                <div class="inline-flex items-center gap-1.5 bg-amber-50/40 border border-amber-100 rounded-2xl px-3 py-2 shadow-sm">
                    <span>
                        {{-- Enlace de página anterior --}}
                        @if ($paginator->onFirstPage())
                            <span aria-disabled="true" aria-label="Anterior">
                                <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-300 bg-white border border-amber-200 cursor-not-allowed rounded-xl leading-5 shadow-sm" aria-hidden="true">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        @else
                            <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150 cursor-pointer" aria-label="Anterior">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </span>

                    {{-- Elementos de paginación --}}
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
                                <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page">
                                            <span class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2.5 text-sm font-bold text-white bg-gradient-to-b from-amber-700 to-amber-900 border border-amber-800 cursor-default rounded-xl leading-5 shadow-md">{{ $page }}</span>
                                        </span>
                                    @else
                                        <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="inline-flex items-center justify-center min-w-[2rem] h-8 px-2.5 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150 cursor-pointer" aria-label="Ir a la página {{ $page }}">
                                            {{ $page }}
                                        </button>
                                    @endif
                                </span>
                            @endforeach
                        @endif
                    @endforeach

                    <span>
                        {{-- Enlace de página siguiente --}}
                        @if ($paginator->hasMorePages())
                            <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-950 bg-white border border-amber-100 rounded-xl leading-5 shadow-sm hover:bg-amber-100 hover:text-amber-900 hover:border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500/50 active:bg-amber-200 transition-all duration-150 cursor-pointer" aria-label="Siguiente">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <span aria-disabled="true" aria-label="Siguiente">
                                <span class="inline-flex items-center justify-center w-8 h-8 text-sm font-medium text-amber-300 bg-white border border-amber-200 cursor-not-allowed rounded-xl leading-5 shadow-sm" aria-hidden="true">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
