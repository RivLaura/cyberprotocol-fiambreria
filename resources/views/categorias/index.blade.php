<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Listado de las Categorías') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Gestión de productos de la fiambrería</p>
            </div>
            <button onclick="Alpine.$data(document.getElementById('category-app')).openCreate()" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Nueva categoría') }}
            </button>
        </div>
    </x-slot>

    <div
        id="category-app"
        x-data="{
            modalMode: 'create',
            form: { nombre: '', descripcion: '' },
            formAction: '{{ route('categorias.store') }}',
            editId: null,

            openCreate() {
                this.modalMode = 'create';
                this.form = { nombre: '', descripcion: '' };
                this.formAction = '{{ route('categorias.store') }}';
                this.editId = null;
                this.$dispatch('open-modal', 'category-form');
            },

            openEdit(categoria) {
                this.modalMode = 'edit';
                this.form = { nombre: categoria.nombre, descripcion: categoria.descripcion ?? '' };
                this.formAction = '{{ url('categorias') }}/' + categoria.id;
                this.editId = categoria.id;
                this.$dispatch('open-modal', 'category-form');
            },

            deleteUrl: '',
            deleteItem: '',
            confirmDelete(url, item) {
                this.deleteUrl = url;
                this.deleteItem = item;
                this.$dispatch('open-modal', 'confirm-delete');
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
                            <td class="px-6 py-1.5 md:py-4 text-sm text-gray-500 md:align-middle">
                                <span class="md:hidden font-serif font-bold text-amber-950 block mb-0.5"></span>
                                <div class="max-w-md break-words italic">{{ $categoria->descripcion ?? 'Producto de alta calidad.' }}</div>
                            </td>
                            <td class="px-6 py-1.5 md:py-4 text-sm text-gray-500 md:align-middle">
                                <span class="md:hidden font-serif font-bold text-amber-950 block mb-0.5"></span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-mono font-bold bg-amber-100 text-amber-800">
                                    {{ $categoria->created_at->format('d/m/Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-3 md:py-4 whitespace-nowrap text-xs font-medium md:align-middle flex justify-start md:justify-end mt-2 md:mt-0 border-t border-dashed border-amber-100 md:border-t-0 pt-3 md:pt-4">
                                <div class="flex items-center space-x-2 w-full md:w-auto justify-start md:justify-end">
                                    <button @click="openEdit(JSON.parse($el.dataset.categoria))" data-categoria='@json($categoria)' class="inline-flex items-center px-3.5 py-2 bg-white text-gray-700 hover:text-amber-700 hover:bg-amber-50 rounded-lg border border-gray-200 hover:border-amber-200 shadow-sm transition-all duration-150 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 mr-1 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Editar
                                    </button>
                                    <button type="button"
                                        @click="confirmDelete('{{ route('categorias.destroy', $categoria->id) }}', '{{ $categoria->nombre }}')"
                                        class="inline-flex items-center px-3.5 py-2 bg-white text-red-600 hover:bg-red-50 rounded-lg border border-gray-200 hover:border-red-200 shadow-sm transition-all duration-150 cursor-pointer">
                                        <svg class="w-3.5 h-3.5 mr-1 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Eliminar
                                    </button>
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

        {{-- Modal de confirmación de eliminación --}}
        <x-modal name="confirm-delete" maxWidth="sm">
            <form :action="deleteUrl" method="POST">
                @csrf
                @method('DELETE')

                <div class="p-6 text-center">
                    <div class="mx-auto mb-4 w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>

                    <h3 class="font-serif text-lg font-bold text-gray-900 mb-2">Eliminar categoría</h3>
                    <p class="text-sm text-gray-500 mb-1">¿Estás seguro de que deseas eliminar esta categoría? Esta acción no se puede deshacer.</p>
                    <p x-text="'\u201C' + deleteItem + '\u201D'" class="text-sm font-bold text-amber-800 bg-amber-50 rounded-lg px-3 py-1.5 inline-block mt-1"></p>
                </div>

                <div class="flex items-center justify-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50/50 rounded-b-2xl">
                    <button type="button" @click="$dispatch('close-modal', 'confirm-delete')"
                        class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl border border-gray-200 shadow-sm transition-all duration-150 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-500 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-red-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Eliminar
                    </button>
                </div>
            </form>
        </x-modal>

        {{-- Modal de creación/edición de categorías --}}
        <x-modal name="category-form" maxWidth="lg">
            <form :action="formAction" method="POST" class="space-y-0">
                @csrf
                <template x-if="modalMode === 'edit'">
                    @method('PUT')
                </template>

                <div class="bg-gradient-to-r from-amber-800 to-amber-950 p-5 rounded-t-2xl">
                    <h3 class="font-serif text-lg text-amber-50 leading-tight tracking-wide" x-text="modalMode === 'create' ? 'Nueva categoría' : 'Editar categoría'"></h3>
                    <p class="text-amber-200/70 text-xs mt-1" x-text="modalMode === 'create' ? 'Introduce los datos para incorporar una nueva categoría.' : 'Modifica los datos de la categoría.'"></p>
                </div>

                <div class="p-6 space-y-5">
                    <div>
                        <label for="modal-nombre" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Nombre de la categoría <span class="text-red-500">*</span></label>
                        <input type="text" name="nombre" id="modal-nombre" x-model="form.nombre" required maxlength="100" placeholder="Ej: Quesos Suizo"
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                    </div>
                    <div>
                        <label for="modal-descripcion" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Descripción <span class="text-gray-400 text-xs">(opcional)</span></label>
                        <textarea name="descripcion" id="modal-descripcion" x-model="form.descripcion" rows="3" placeholder="Detalla las características de esta categoría..."
                            class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 text-sm transition-all duration-200 p-3"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-amber-100/70 bg-gray-50/50 rounded-b-2xl">
                    <button type="button" @click="$dispatch('close-modal', 'category-form')" class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl border border-gray-200 shadow-sm transition-all duration-150 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                        <span x-text="modalMode === 'create' ? 'Registrar categoría' : 'Actualizar categoría'"></span>
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
