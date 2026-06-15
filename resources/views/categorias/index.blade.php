<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg">

            <div>

                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">

                    {{ __('Listado de las Categorías') }}

                </h2>

                <p class="text-amber-200/70 text-xs mt-1">Gestión de productos de la fiambrería</p>

            </div>

            <a href="{{ route('categorias.create') }}" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200">

                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>

                {{ __('Nueva categoría') }}

            </a>

        </div>

    </x-slot>
    <div class="py-12 bg-amber-50/40 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Contenedor de la Tabla con sombra y bordes redondeados -->

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">

                @forelse($categorias as $categoria)
                @if ($loop->first)
                <table class="min-w-full divide-y divide-amber-100 block md:table">
                    <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30 hidden md:table-header-group">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-mono uppercase tracking-widest text-amber-800 font-bold"></th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold"></th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold"></th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white block md:table-row-group">
                        @endif

                        <tr class="group flex flex-col md:table-row mb-4 md:mb-0 border-t-4 border-amber-600 md:border-t-0 border-b border-amber-100/70 md:border-b-0 p-5 md:p-0 bg-amber-50/10 md:bg-transparent rounded-xl md:rounded-none m-4 md:m-0 hover:bg-amber-50/60 hover:shadow-sm md:hover:shadow-none md:hover:bg-amber-50/40 transition-all duration-200">
                            <td class="px-6 py-1.5 md:py-4 whitespace-nowrap text-sm font-mono text-amber-700 md:align-middle">

                                <span class="md:hidden font-sans font-bold text-gray-400 mr-2"></span>{{ $categoria->id }}
                            </td>
                            <td class="px-6 py-1.5 md:py-4 whitespace-nowrap md:align-middle">
                                <div class="flex items-center">
                                    <div class="w-9 h-9 bg-amber-100 text-amber-900 font-serif font-bold rounded-full flex items-center justify-center text-sm border border-amber-200/50 mr-3 shrink-0 group-hover:scale-105 group-hover:bg-amber-200 transition-all duration-200">

                                        {{ Str::substr($categoria->nombre, 0, 1) }}
                                    </div>
                                    <div class="text-sm font-serif font-bold text-gray-900">
                                        <span class="md:hidden font-serif text-gray-400 font-normal mr-1"></span>{{ $categoria->nombre }}
                                    </div>
                                </div>
                            </td>

                            <!-- Descripción con estilo de texto más pequeño y en cursiva para resaltar su carácter informativo -->

                            <td class="px-6 py-1.5 md:py-4 text-sm text-gray-500 md:align-middle">

                                <span class="md:hidden font-serif font-bold text-amber-950 block mb-0.5"></span>

                                <div class="max-w-md break-words italic">{{ $categoria->descripcion ?? 'Producto de alta calidad.' }}</div>

                            </td>
                            <td class="px-6 py-1.5 md:py-4 text-sm text-gray-500 md:align-middle">
                                <span class="md:hidden font-serif font-bold text-amber-950 block mb-0.5"></span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-mono font-bold bg-amber-100 text-amber-800">
                                    {{ $categoria->created_at->format('d M Y') }}
                                </span>
                            </td>

                            <td class="px-6 py-3 md:py-4 whitespace-nowrap text-xs font-medium md:align-middle flex justify-start md:justify-end mt-2 md:mt-0 border-t border-dashed border-amber-100 md:border-t-0 pt-3 md:pt-4">
                                <div class="flex items-center space-x-2">
                                    <div class="px-6 py-4 bg-gray-50/80 border-t border-gray-100 flex justify-end space-x-2 text-xs font-semibold">
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="inline-flex items-center px-3.5 py-2 bg-white text-gray-700 hover:text-amber-700 hover:bg-amber-50 rounded-lg border border-gray-200 hover:border-amber-200 shadow-sm transition-all duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 mr-1 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Editar
                                        </a>

                                        <form action="{{ route('categorias.store', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3.5 py-2 bg-white text-red-600 hover:bg-red-50 rounded-lg border border-gray-200 hover:border-red-200 shadow-sm transition-all duration-150">
                                                <svg class="w-3.5 h-3.5 mr-1 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                            </td>
                        </tr>

                        @if ($loop->last)
                    </tbody>
                </table>
                @endif
                @empty
                <div class="bg-white rounded-2xl p-10 md:p-16 text-center border-2 border-dashed border-amber-200 shadow-inner m-4">
                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100 animate-pulse">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-amber-950">No hay categorías registradas</h3>
                    <p class="mt-2 text-sm text-amber-800/60 max-w-sm mx-auto italic">
                        Comienza agregando categorías de productos (como Quesos o Embutidos) usando el botón superior.
                    </p>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>