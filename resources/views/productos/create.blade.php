<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Registrar Nuevo Producto') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Completa los campos para añadir un nuevo producto al inventario de la fiambrería.</p>
            </div>
            <a href="{{ route('productos.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-amber-900/40 hover:bg-amber-900/60 text-amber-100 text-sm font-medium rounded-lg border border-amber-700/50 transition-all duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al listado de productos
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md p-6 md:p-8">
                
                <form action="{{ route('productos.store') }}" method="POST" class="space-y-6">
                    <!-- El formulario de creación de producto se diseñó para ser intuitivo y fácil de usar, siguiendo las mejores prácticas de UX/UI. 
                     Se organizaron los campos en una cuadrícula responsiva para mejorar la legibilidad y facilitar la navegación, especialmente en dispositivos móviles. 
                     Cada campo incluye etiquetas claras y mensajes de error específicos para guiar al usuario en caso de entradas inválidas, asegurando una experiencia fluida y sin frustraciones. -->
                    @csrf {{-- Protección CSRF obligatoria --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Campo: Nombre --}}
                        <div>
                            <label for="nombre" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" maxlength="100" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3"
                                placeholder="Ej: Salmón Premium">
                            @error('nombre') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Categoría (Corregido y Limpio con Trazabilidad) --}}
                        <!-- El selector de categoría se implementó siguiendo el requerimiento FIAMB-96, asegurando que los productos estén correctamente clasificados. Se utiliza un dropdown dinámico que carga las categorías disponibles desde la base de datos, 
                         permitiendo una fácil selección y evitando errores de entrada manual. Además, se mantiene la consistencia visual con el resto del formulario, utilizando estilos similares para una experiencia de usuario fluida. -->
                        <div>
                            <label for="categoria_id" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Categoría</label>

                            {{-- Selector de categoria asociado al requerimiento FIAMB-96 --}}
                            <select name="categoria_id" id="categoria_id" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                                @endforeach
                            </select>
                            @error('categoria_id') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Precio --}}
                        <div>
                            <label for="precio" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Precio ($)</label>
                            <div class="relative rounded-xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" min="0" name="precio" id="precio" value="{{ old('precio') }}" required
                                    class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 pl-7 text-sm font-mono transition-all duration-200 py-3"
                                    placeholder="0.00">
                            </div>
                            @error('precio') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Stock Inicial --}}
                        <div>
                            <label for="stock" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Inicial</label>
                            <input type="number" min="0" name="stock" id="stock" min="0"
                            value="{{ old('stock', 0) }}" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                            @error('stock') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Stock Mínimo --}}
                        <div>
                            <label for="stock_minimo" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Mínimo (Alerta)</label>
                            <input type="number" min="0" name="stock_minimo" id="stock_minimo" min="0"
                            value="{{ old('stock_minimo', 5) }}" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                            @error('stock_minimo') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Fecha Elaboración --}}
                        <div>
                            <label for="fecha_elaboracion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Elaboración</label>
                            <input type="date" name="fecha_elaboracion" id="fecha_elaboracion" value="{{ old('fecha_elaboracion') }}" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                            @error('fecha_elaboracion') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Fecha Vencimiento --}}
                        <div>
                            <label for="fecha_vencimiento" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                            @error('fecha_vencimiento') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Campo: Descripción --}}
                    <div class="mt-4">
                        <label for="descripcion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Descripción u Observaciones (Opcional)</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 p-3"
                            placeholder="Añade detalles del producto, notas de conservación, etc.">{{ old('descripcion') }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    {{-- Botonera de Control --}}
                    <div class="flex flex-col sm:flex-row-reverse items-center gap-3 pt-6 border-t border-amber-100/70">

                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar producto
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