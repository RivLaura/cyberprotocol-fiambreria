<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Listado de Productos') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Gestiona el inventario de productos, edita detalles o elimina productos obsoletos.</p>
            </div>
            <button onclick="Alpine.$data(document.getElementById('product-app')).openCreate()" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Registrar Nuevo Producto') }}
            </button>
        </div>
    </x-slot>

    <div
        id="product-app"
        x-data="{
            modalMode: 'create',
            form: {
                nombre: '', categoria_id: '', precio: '', stock: '', stock_minimo: '',
                fecha_elaboracion: '', fecha_vencimiento: '', descripcion: ''
            },
            formAction: '{{ route('productos.store') }}',
            editId: null,
            editImagenUrl: '',

            openCreate() {
                this.modalMode = 'create';
                this.form = { nombre: '', categoria_id: '', precio: '', stock: '', stock_minimo: '', fecha_elaboracion: '', fecha_vencimiento: '', descripcion: '' };
                this.formAction = '{{ route('productos.store') }}';
                this.editId = null;
                this.editImagenUrl = '';
                this.$dispatch('open-modal', 'product-form');
            },

            openEdit(producto) {
                this.modalMode = 'edit';
                this.form = {
                    nombre: producto.nombre,
                    categoria_id: producto.categoria_id,
                    precio: producto.precio,
                    stock: producto.stock,
                    stock_minimo: producto.stock_minimo,
                    fecha_elaboracion: producto.fecha_elaboracion,
                    fecha_vencimiento: producto.fecha_vencimiento,
                    descripcion: producto.descripcion ?? ''
                };
                this.formAction = '{{ url('productos') }}/' + producto.id;
                this.editId = producto.id;
                this.editImagenUrl = producto.imagen_url ?? '';
                this.$dispatch('open-modal', 'product-form');
            }
        }"
        class="py-12 bg-amber-50/40 min-h-screen"
    >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="max-w-7xl mx-auto mb-6 px-4 sm:px-6 lg:px-8">
                <div class="p-4 bg-orange-100 border-l-4 border-orange-500 text-amber-950 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                    <svg class="w-5 h-5 mr-3 text-orange-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <div class="mb-6">
                <form method="GET" action="{{ route('productos.index') }}">
                    <input type="text" name="buscar" value="{{ $buscar }}" placeholder="Buscar producto..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-amber-500 focus:ring-amber-500">
                </form>
            </div>

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">

                @forelse($productos as $index => $producto)
                @if ($loop->first)
                <table class="w-full divide-y divide-amber-100 block md:table table-fixed md:table-auto">
                    <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30 hidden md:table-header-group">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold w-1/4">Producto</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Categoría</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Precio</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Stock</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Vencimiento</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white block md:table-row-group">
                        @endif

                        <tr class="group flex flex-col md:table-row mb-5 md:mb-0 border-t-4 border-amber-600 md:border-t-0 border-b border-amber-100/60 md:border-b-0 bg-white md:bg-transparent rounded-2xl md:rounded-none m-4 md:m-0 shadow-sm md:shadow-none hover:shadow-md md:hover:shadow-none md:hover:bg-amber-50/40 transition-all duration-200 overflow-hidden">

                            <td class="px-5 pt-5 pb-3 md:px-6 md:py-4 whitespace-nowrap md:align-middle block md:table-cell">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-amber-100 text-amber-900 font-serif font-bold rounded-xl flex items-center justify-center text-lg border border-amber-200/50 mr-3 shrink-0 group-hover:scale-105 group-hover:bg-amber-200 transition-all duration-200 capitalize overflow-hidden">
                                        @if($producto->imagen_url)
                                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                                        @else
                                        {{ Str::substr($producto->nombre, 0, 1) }}
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-base md:text-sm font-serif font-bold text-gray-900 leading-tight">
                                            {{ $producto->nombre }}
                                        </div>
                                        <div class="md:hidden mt-1">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-amber-50 text-amber-800 border border-amber-100/70">
                                                {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap md:align-middle text-sm text-gray-600 hidden md:table-cell">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-800 border border-amber-100">
                                    {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                </span>
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell border-t border-gray-50 md:border-t-0 w-1/2 md:w-auto">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-0.5">Precio</span>
                                <span class="text-base md:text-sm font-mono font-bold text-gray-900">${{ number_format($producto->precio, 2) }}</span>
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell">
                                @if($producto->stock == 0)
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-red-600 text-white text-xs font-bold">Sin stock</span>
                                @elseif($producto->stock <= $producto->stock_minimo)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-yellow-100 text-yellow-800 text-xs font-bold">Stock crítico ({{ $producto->stock }})</span>
                                    @else
                                    <span class="text-base font-mono text-gray-900">{{ $producto->stock }} u.</span>
                                    @endif
                            </td>

                            <td class="px-5 py-2.5 pb-4 md:px-6 md:py-4 block md:table-cell">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Fecha de Vencimiento</span>
                                @php
                                $vencido = $producto->fecha_vencimiento && \Carbon\Carbon::parse($producto->fecha_vencimiento)->isPast();
                                @endphp
                                <div class="flex flex-col gap-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-mono font-bold bg-amber-50 text-amber-900">
                                        {{ $producto->fecha_vencimiento ? \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') : 'No aplica' }}
                                    </span>
                                    @if($vencido)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">🔴 Producto vencido</span>
                                    @endif
                                </div>
                            </td>

                            <td class="px-5 py-3 md:px-6 md:py-4 whitespace-nowrap text-xs font-medium md:align-middle bg-gray-50/50 md:bg-transparent flex md:table-cell justify-between border-t border-gray-100 md:border-t-0">
                                <div class="flex items-center space-x-2 w-full md:w-auto justify-end">
                                    <button
                                        @click="openEdit(JSON.parse($el.dataset.producto))"
                                        data-producto='@json($producto)'
                                        class="inline-flex items-center justify-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 text-xs font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Editar
                                    </button>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-500 text-white text-xs font-bold rounded-xl shadow-sm hover:shadow-red-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-amber-950">No hay productos registrados</h3>
                    <p class="mt-2 text-sm text-amber-800/60 max-w-sm mx-auto italic">Comienza agregando productos a tu inventario usando el botón superior.</p>
                </div>
                @endforelse

                @if($productos->hasPages())
                <div class="p-5 border-t border-amber-100">
                    {{ $productos->links() }}
                </div>
                @endif

            </div>
        </div>

        {{-- Modal de creación/edición de productos --}}
        <x-modal name="product-form" maxWidth="4xl">
            <form :action="formAction" method="POST" class="space-y-0" enctype="multipart/form-data">
                @csrf
                <template x-if="modalMode === 'edit'">
                    @method('PUT')
                </template>

                <div class="bg-gradient-to-r from-amber-800 to-amber-950 p-5 rounded-t-2xl">
                    <h3 class="font-serif text-lg text-amber-50 leading-tight tracking-wide" x-text="modalMode === 'create' ? 'Registrar Nuevo Producto' : 'Editar Producto'"></h3>
                    <p class="text-amber-200/70 text-xs mt-1" x-text="modalMode === 'create' ? 'Completa los campos para añadir un nuevo producto al inventario.' : 'Modifica los detalles del producto seleccionado.'"></p>
                </div>

                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="modal-nombre" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Nombre del producto</label>
                            <input type="text" name="nombre" id="modal-nombre" x-model="form.nombre" required maxlength="100" placeholder="Ej: Salmón Premium"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-categoria_id" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Categoría</label>
                            <select name="categoria_id" id="modal-categoria_id" x-model="form.categoria_id" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 py-3">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="modal-precio" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Precio ($)</label>
                            <div class="relative rounded-xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" min="0" name="precio" id="modal-precio" x-model="form.precio" required
                                    class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 pl-7 text-sm font-mono transition-all duration-200 py-3"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label for="modal-stock" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Inicial</label>
                            <input type="number" min="0" name="stock" id="modal-stock" x-model="form.stock" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-stock_minimo" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Stock Mínimo (Alerta)</label>
                            <input type="number" min="0" name="stock_minimo" id="modal-stock_minimo" x-model="form.stock_minimo" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-fecha_elaboracion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Elaboración</label>
                            <input type="date" name="fecha_elaboracion" id="modal-fecha_elaboracion" x-model="form.fecha_elaboracion" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-fecha_vencimiento" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Fecha de Vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="modal-fecha_vencimiento" x-model="form.fecha_vencimiento" required
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm font-mono transition-all duration-200 py-3">
                        </div>
                    </div>

                    <div>
                        <label for="modal-imagen" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Imagen del producto (Opcional)</label>
                        <div class="flex items-center gap-4">
                            <template x-if="modalMode === 'edit' && editImagenUrl">
                                <div class="w-20 h-20 rounded-xl overflow-hidden border border-amber-200 shrink-0 bg-amber-50">
                                    <img :src="editImagenUrl" alt="Imagen actual" class="w-full h-full object-cover">
                                </div>
                            </template>
                            <div class="flex-1">
                                <input type="file" name="imagen" id="modal-imagen" accept="image/jpeg,image/png,image/webp"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 file:cursor-pointer cursor-pointer border border-gray-300 rounded-xl px-3 py-2 focus:border-amber-500 focus:ring-amber-500">
                                <p class="mt-1 text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">JPG, PNG o WEBP. Max 2MB. Deja en blanco para mantener la actual.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="modal-descripcion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Descripción u Observaciones (Opcional)</label>
                        <textarea name="descripcion" id="modal-descripcion" x-model="form.descripcion" rows="2"
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 p-3"
                            placeholder="Añade detalles del producto, notas de conservación, etc."></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-amber-100/70 bg-gray-50/50 rounded-b-2xl">
                    <button type="button" @click="$dispatch('close-modal', 'product-form')" class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl border border-gray-200 shadow-sm transition-all duration-150 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span x-text="modalMode === 'create' ? 'Guardar producto' : 'Actualizar producto'"></span>
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
