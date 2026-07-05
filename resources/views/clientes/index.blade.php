<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gradient-to-r from-amber-800 to-amber-950 p-6 rounded-xl shadow-lg gap-4">
            <div>
                <h2 class="font-serif text-2xl text-amber-50 leading-tight tracking-wide">
                    {{ __('Listado de Clientes') }}
                </h2>
                <p class="text-amber-200/70 text-xs mt-1">Gestiona los clientes registrados, edita sus datos o elimina clientes obsoletos.</p>
            </div>
            <button onclick="Alpine.$data(document.getElementById('client-app')).openCreate()" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-lg shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Registrar Nuevo Cliente') }}
            </button>
        </div>
    </x-slot>

    <div
        id="client-app"
        x-data="{
            modalMode: 'create',
            form: { nombre: '', apellido: '', telefono: '', email: '' },
            formAction: '{{ route('clientes.store') }}',
            editId: null,

            openCreate() {
                this.modalMode = 'create';
                this.form = { nombre: '', apellido: '', telefono: '', email: '' };
                this.formAction = '{{ route('clientes.store') }}';
                this.editId = null;
                this.$dispatch('open-modal', 'client-form');
            },

            openEdit(cliente) {
                this.modalMode = 'edit';
                this.form = {
                    nombre: cliente.nombre,
                    apellido: cliente.apellido,
                    telefono: cliente.telefono ?? '',
                    email: cliente.email ?? ''
                };
                this.formAction = '{{ url('clientes') }}/' + cliente.id;
                this.editId = cliente.id;
                this.$dispatch('open-modal', 'client-form');
            }
        }"
        class="py-12 bg-amber-50/40 min-h-screen">
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

            @if (session('error'))
            <div class="max-w-7xl mx-auto mb-6 px-4 sm:px-6 lg:px-8">
                <div class="p-4 bg-red-100 border-l-4 border-red-500 text-red-800 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                    <svg class="w-5 h-5 mr-3 text-red-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
            @endif

            <div class="mb-6">
                <form method="GET" action="{{ route('clientes.index') }}" class="mb-6">

                    <div class="relative">

                        <input
                            type="text"
                            name="buscar"
                            value="{{ request('buscar') }}"
                            placeholder="Buscar por nombre, apellido, teléfono o email..."
                            class="w-full rounded-xl border border-amber-200 px-4 py-3 pr-12 focus:border-amber-500 focus:ring-amber-500">

                        <button
                            type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 p-2 rounded-lg hover:bg-amber-100 transition">

                            <svg class="w-5 h-5 text-amber-700"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />

                            </svg>

                        </button>

                    </div>

                </form>
            </div>

            <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md">

                @forelse($clientes as $cliente)
                @if ($loop->first)
                <table class="w-full divide-y divide-amber-100 block md:table table-fixed md:table-auto">
                    <thead class="bg-gradient-to-r from-gray-50 to-amber-50/30 hidden md:table-header-group">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold w-1/4">Nombre</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Apellido</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Teléfono</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Correo electrónico</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-serif uppercase tracking-wider text-amber-950 font-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white block md:table-row-group">
                        @endif

                        <tr class="group flex flex-col md:table-row mb-5 md:mb-0 border-t-4 border-amber-600 md:border-t-0 border-b border-amber-100/60 md:border-b-0 bg-white md:bg-transparent rounded-2xl md:rounded-none m-4 md:m-0 shadow-sm md:shadow-none hover:shadow-md md:hover:shadow-none md:hover:bg-amber-50/40 transition-all duration-200 overflow-hidden">

                            <td class="px-5 pt-5 pb-3 md:px-6 md:py-4 whitespace-nowrap md:align-middle block md:table-cell">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-amber-100 text-amber-900 font-serif font-bold rounded-xl flex items-center justify-center text-sm border border-amber-200/50 mr-3 shrink-0 group-hover:scale-105 group-hover:bg-amber-200 transition-all duration-200 capitalize">
                                        {{ Str::substr($cliente->nombre, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-base md:text-sm font-serif font-bold text-gray-900 leading-tight">
                                            {{ $cliente->nombre }}
                                        </div>
                                        <div class="md:hidden text-xs text-gray-400 mt-0.5">
                                            {{ $cliente->apellido }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap md:align-middle text-sm text-gray-600 hidden md:table-cell">
                                {{ $cliente->apellido }}
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell border-t border-gray-50 md:border-t-0 w-1/2 md:w-auto">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-0.5">Teléfono</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-800 border border-amber-100">
                                    {{ $cliente->telefono ?? '-' }}
                                </span>
                            </td>

                            <td class="px-5 py-2 md:px-6 md:py-4 block md:table-cell border-t border-gray-50 md:border-t-0 w-1/2 md:w-auto">
                                <span class="md:hidden block text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-0.5">Correo</span>
                                <span class="text-sm text-gray-600">{{ $cliente->email ?? '-' }}</span>
                            </td>

                            <td class="px-5 py-3 md:px-6 md:py-4 whitespace-nowrap text-xs font-medium md:align-middle bg-gray-50/50 md:bg-transparent flex md:table-cell justify-between border-t border-gray-100 md:border-t-0">
                                <div class="flex items-center space-x-2 w-full md:w-auto justify-end">
                                    <button @click="openEdit(JSON.parse($el.dataset.cliente))" data-cliente='@json($cliente)' class="inline-flex items-center justify-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 text-xs font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Editar
                                    </button>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estas seguro de que deseas eliminar este cliente?')"
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-amber-950">No hay clientes registrados</h3>
                    <p class="mt-2 text-sm text-amber-800/60 max-w-sm mx-auto italic">Comienza agregando clientes usando el boton superior.</p>
                </div>
                @endforelse

                @if($clientes->hasPages())
                <div class="p-5 border-t border-amber-100">
                    {{ $clientes->links() }}
                </div>
                @endif

            </div>
        </div>

        {{-- Modal de creación/edición de clientes --}}
        <x-modal name="client-form" maxWidth="lg">
            <form :action="formAction" method="POST" class="space-y-0">
                @csrf
                <template x-if="modalMode === 'edit'">
                    @method('PUT')
                </template>

                <div class="bg-gradient-to-r from-amber-800 to-amber-950 p-5 rounded-t-2xl">
                    <h3 class="font-serif text-lg text-amber-50 leading-tight tracking-wide" x-text="modalMode === 'create' ? 'Registrar Cliente' : 'Editar Cliente'"></h3>
                    <p class="text-amber-200/70 text-xs mt-1" x-text="modalMode === 'create' ? 'Ingresa los datos del nuevo cliente.' : 'Modifica los datos del cliente.'"></p>
                </div>

                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="modal-nombre" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Nombre <span class="text-red-500">*</span></label>
                            <input type="text" name="nombre" id="modal-nombre" x-model="form.nombre" required placeholder="Nombre del cliente"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-apellido" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Apellido <span class="text-red-500">*</span></label>
                            <input type="text" name="apellido" id="modal-apellido" x-model="form.apellido" required placeholder="Apellido del cliente"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-telefono" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Teléfono</label>
                            <input type="text" name="telefono" id="modal-telefono" x-model="form.telefono" placeholder="+54 11 1234-5678"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                        </div>
                        <div>
                            <label for="modal-email" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2">Correo electrónico</label>
                            <input type="email" name="email" id="modal-email" x-model="form.email" placeholder="correo@ejemplo.com"
                                class="w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200/50 bg-amber-50/10 placeholder-gray-400 text-sm transition-all duration-200 py-3">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-amber-100/70 bg-gray-50/50 rounded-b-2xl">
                    <button type="button" @click="$dispatch('close-modal', 'client-form')" class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl border border-gray-200 shadow-sm transition-all duration-150 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-amber-950 text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span x-text="modalMode === 'create' ? 'Guardar Cliente' : 'Actualizar Cliente'"></span>
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>