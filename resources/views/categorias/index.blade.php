<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Listado de las categorias') }}
                </h2>
           <p class="text-amber-200/70 text-xs mt-1">Gestión de productos y familias de la fiambrería</p>
            </div>
            <a href="{{ route('categorias.create') }}" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                {{ __('Nueva Categoría') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($categorias as $categoria)
                    <div class="group relative bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl hover:border-amber-200 transition-all duration-300 flex flex-col justify-between">
                        
                        <div class="h-2 bg-gradient-to-r from-amber-500 to-orange-600"></div>
                        
                        <div class="p-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-amber-100 to-amber-50 text-amber-800 font-serif font-black rounded-full flex items-center justify-center text-xl border border-amber-200/60 shadow-inner group-hover:scale-110 transition-transform duration-300">
                                    {{ Str::substr($categoria->nombre, 0, 1) }}
                                </div>
                                
                                <div class="flex-1">
                                    <span class="text-[10px] font-mono uppercase tracking-widest text-amber-600 bg-amber-100/50 px-2 py-0.5 rounded">Ref. #{{ $categoria->id }}</span>
                                    <h3 class="text-xl font-serif font-bold text-gray-900 mt-1 group-hover:text-amber-900 transition-colors">
                                        {{ $categoria->nombre }}
                                    </h3>
                                    <p class="text-gray-500 text-xs mt-1.5 leading-relaxed">
                                        {{ $categoria->descripcion ?? 'Producto de alta calidad.' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-4 bg-gray-50/80 border-t border-gray-100 flex justify-end space-x-2 text-xs font-semibold">
                            <a href="{{ route('categorias.create', $categoria->id) }}" class="inline-flex items-center px-3.5 py-2 bg-white text-gray-700 hover:text-amber-700 hover:bg-amber-50 rounded-lg border border-gray-200 hover:border-amber-200 shadow-sm transition-all">
                                <svg class="w-3.5 h-3.5 mr-1 text-gray-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21H3v-3.5//"></svg>
                                Editar
                            </a>
                            
                            <form action="{{ route('categorias.store', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3.5 py-2 bg-white text-red-600 hover:bg-red-50 rounded-lg border border-gray-200 hover:border-red-200 shadow-sm transition-all">
                                    <svg class="w-3.5 h-3.5 mr-1 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-12 text-center border border-dashed border-gray-300">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay categorías registradas</h3>
                        <p class="mt-1 text-sm text-gray-500">Haz clic en "Nueva Categoría" para añadir la primera.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>