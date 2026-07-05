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

                <form action="{{ route('productos.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    <!-- El formulario de creación de producto se diseñó para ser intuitivo y fácil de usar, siguiendo las mejores prácticas de UX/UI. 
                     Se organizaron los campos en una cuadrícula responsiva para mejorar la legibilidad y facilitar la navegación, especialmente en dispositivos móviles. 
                     Cada campo incluye etiquetas claras y mensajes de error específicos para guiar al usuario en caso de entradas inválidas, asegurando una experiencia fluida y sin frustraciones. -->
                    @csrf {{-- Protección CSRF obligatoria --}}

                    {{-- ===========================
                        OpenFoodFacts
                    =========================== --}}
                    <div class="rounded-2xl border border-amber-200 bg-amber-50/50 p-6 shadow-sm">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-600 text-white text-xl">
                                🔎
                            </div>

                            <div>
                                <h3 class="font-serif text-lg font-bold text-amber-950">
                                    Buscar producto en OpenFoodFacts
                                </h3>

                                <p class="text-sm text-amber-700">
                                    Ingresá un código de barras para completar automáticamente algunos datos.
                                </p>
                            </div>

                        </div>

                        <div class="flex gap-3">

                            <input
                                id="codigo_barras"
                                type="text"
                                class="flex-1 rounded-xl border-amber-200 focus:border-amber-500 focus:ring-amber-500"
                                placeholder="Ej: 7622210449283">

                            <button
                                id="buscarProducto"
                                type="button"
                                class="px-6 rounded-xl bg-amber-600 text-white font-semibold hover:bg-amber-700 transition">

                                Buscar

                            </button>

                        </div>

                        <div id="previewProducto"
                            class="hidden mt-6 rounded-xl border border-amber-200 bg-white p-4">

                            <div class="flex items-center gap-5">

                                <img
                                    id="previewImagen"
                                    src=""
                                    class="hidden h-24 w-24 rounded-xl border object-cover">

                                <div>

                                    <h4
                                        id="previewNombre"
                                        class="text-lg font-bold text-amber-900">
                                    </h4>

                                    <p
                                        id="previewMarca"
                                        class="text-sm text-gray-600">
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
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
                            <input type="number" min="0" name="stock" id="stock"
                                value="{{ old('stock', 0) }}" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                            @error('stock') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        {{-- Campo: Stock Mínimo --}}
                        <div>
                            <label for="stock_minimo" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Mínimo (Alerta)</label>
                            <input type="number" min="0" name="stock_minimo" id="stock_minimo"
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

                    {{-- Campo: Imagen del producto --}}
                    <div class="mt-4">
                        <label for="imagen" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Imagen del producto (Opcional)</label>
                        <input type="file" name="imagen" id="imagen" accept="image/jpeg,image/png,image/webp"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 file:cursor-pointer cursor-pointer border border-gray-300 rounded-xl px-3 py-2 focus:border-amber-500 focus:ring-amber-500">
                        <p class="mt-1 text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">JPG, PNG o WEBP. Max 2MB.</p>
                        @error('imagen') <span class="text-red-500 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
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

    <script>
        const boton = document.getElementById('buscarProducto');

        boton.addEventListener('click', async () => {

            const codigo = document.getElementById('codigo_barras').value.trim();

            if (!codigo) {

                alert('Ingrese un código de barras.');

                return;

            }

            try {

                const response = await fetch('/openfoodfacts/' + codigo);

                const data = await response.json();

                if (!data.success) {

                    alert(data.message);

                    return;

                }

                document.getElementById('nombre').value =
                    data.producto.nombre;

                document.getElementById('previewNombre').textContent =
                    data.producto.nombre;

                document.getElementById('previewMarca').textContent =
                    data.producto.marca;

                if (data.producto.imagen) {

                    const img = document.getElementById('previewImagen');

                    img.src = data.producto.imagen;

                    img.classList.remove('hidden');

                }

                document.getElementById('previewProducto')
                    .classList.remove('hidden');

            } catch (error) {

                console.error(error);

                alert('No se pudo consultar la API.');

            }

        });
    </script>
</x-app-layout>