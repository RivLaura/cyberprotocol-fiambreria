<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    Editar Producto: {{ $producto->nombre }}
                </h2>
                <p class="mt-1 text-sm text-amber-200">
                    Modifica los detalles del producto seleccionado.
                </p>
            </div>
            <div class="flex space-x-2 mt-4 sm:mt-0">
                <a href="{{ route('productos.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-amber-900/40 hover:bg-amber-900/60 text-amber-100 text-sm font-medium rounded-lg border border-amber-700/50 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('Volver a productos') }}
                </a>
            </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md p-6 md:p-8">

                <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="space-y-6">
                    <!-- CSRF Token y método PUT para actualización -->
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label for="nombre" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Nombre del Producto</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3" required>
                            @error('nombre') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="categoria_id" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Categoría</label>
                            <select name="categoria_id" id="categoria_id" class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3" required>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                                @endforeach
                            </select>
                            @error('categoria_id') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <!-- Campo de descripción con textarea -->
                        <label for="descripcion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="precio" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Precio</label>
                            <input type="number" step="0.01" name="precio" id="precio"
                                value="{{ old('precio', $producto->precio) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3" required>
                            @error('precio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Actual</label>
                            <input type="number" name="stock" id="stock"
                                value="{{ old('stock', $producto->stock) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3" required>
                            @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="stock_minimo" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Mínimo</label>
                            <input type="number" name="stock_minimo" id="stock_minimo"
                                value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3" required>
                            @error('stock_minimo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="fecha_elaboracion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Elaboración</label>
                            <input type="date" name="fecha_elaboracion" id="fecha_elaboracion"
                                value="{{ old('fecha_elaboracion', $producto->fecha_elaboracion) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3">
                            @error('fecha_elaboracion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="fecha_vencimiento" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento"
                                value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3">
                            @error('fecha_vencimiento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end items-center gap-4 mt-6 border-t border-amber-100/70">
                
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">

                            {{-- Nuevo Icono SVG: Flechas de actualización en círculo --}}
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M21 3v5h-5" />
                            </svg>

                            Actualizar el Producto
                        </button>
                        <a href="{{ route('productos.index') }}"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl border border-gray-200 shadow-sm transition-all duration-150">
                            Cancelar
                        </a>
                    </div>
                
                </form>

            </div>
        </div>
    </div>
</x-app-layout>