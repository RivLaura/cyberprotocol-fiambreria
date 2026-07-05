<x-app-layout>

    <div
        class="py-12 bg-amber-50/40 min-h-screen"
        x-data="{
            mostrarModal: false,

            producto: {
                id: '',
                nombre: '',
                precio: '',
                categoria: '',
                stock: ''
            },

            clienteSeleccionado: '{{ $clienteConsumidorFinal?->id }}',

            cantidad: '',

            subtotal: 0,

            stockValido: true,

            calcularSubtotal() {

                if (this.cantidad == '' || this.cantidad <= 0) {

                    this.subtotal = 0;
                    this.stockValido = true;
                    return;

                }

                if (this.cantidad > this.producto.stock) {

                    this.stockValido = false;
                    this.subtotal = 0;
                    return;

                }

                this.stockValido = true;

                if (this.producto.categoria == 'Bebidas') {

                    this.subtotal = this.producto.precio * this.cantidad;

                } else {

                    this.subtotal = (this.producto.precio * this.cantidad) / 1000;

                }

            }
        }"
        x-on:abrir-modal.window="
            producto = $event.detail;
            cantidad = '';
            subtotal = 0;
            stockValido = true;
            mostrarModal = true;
        ">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gradient-to-r from-amber-800 to-amber-950 p-4 sm:p-6 rounded-xl shadow-lg mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center w-full gap-4">

                    <div>

                        <h1 class="font-serif text-3xl sm:text-5xl font-bold text-white leading-none tracking-wide drop-shadow-md">
                            Punto de Venta
                        </h1>

                        <p class="mt-2 text-sm sm:text-base text-amber-200 font-medium">
                            Seleccione los productos para comenzar una nueva venta.
                        </p>
                        
                        <div class="mt-4 h-1 w-24 rounded-full bg-amber-400"></div>

                    </div>

                    @isset($clima)

                    <div class="text-left sm:text-right rounded-xl px-4 sm:px-5 py-3 border border-white/10 backdrop-blur-sm w-full sm:w-auto">

                        <div class="text-[10px] sm:text-xs uppercase tracking-[0.2em] text-amber-300 font-bold">

                            {{ $estadoClima['icono'] }}
                            {{ strtoupper($clima['ciudad']) }}

                        </div>

                        <div class="text-2xl sm:text-4xl font-bold text-white leading-none mt-1">

                            {{ round($clima['datos']['current']['temperature_2m']) }}°

                        </div>

                        <p class="text-[11px] sm:text-xs text-amber-200 mt-1 tracking-wide">
                            {{ $estadoClima['descripcion'] }}
                        </p>

                        <div class="mt-2 flex justify-start sm:justify-end gap-4 text-xs sm:text-sm text-amber-100">

                            <span>💧 {{ $clima['datos']['current']['relative_humidity_2m'] }}%</span>

                            <span>💨 {{ round($clima['datos']['current']['wind_speed_10m']) }} km/h</span>

                        </div>

                    </div>

                    @endisset

                </div>
            </div>
        </div>

        @if(session('error'))
        <div class="mb-6">
            <div class="p-4 bg-red-100 border-l-4 border-red-500 text-red-800 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                <svg class="w-5 h-5 mr-3 text-red-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="mb-6">
            <div class="p-4 bg-orange-100 border-l-4 border-orange-500 text-amber-950 text-sm font-semibold rounded-r-xl shadow-md flex items-center">
                <svg class="w-5 h-5 mr-3 text-orange-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- PANEL IZQUIERDO -->
            <section class="lg:col-span-8">

                <livewire:pos.catalogo-productos />

            </section>

            <!-- PANEL DERECHO -->
            <aside class="lg:col-span-4">

                <div class="bg-white overflow-hidden rounded-2xl border border-amber-100 shadow-md sticky top-6">

                    <div class="p-5 border-b border-amber-100 bg-gradient-to-r from-gray-50 to-amber-50/30">
                        <h2 class="font-serif text-lg font-bold text-amber-950">
                            Detalle de Venta
                        </h2>
                    </div>

                    <div class="p-5">

                        <div class="mb-5">

                            <label class="block mb-2 text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase">
                                Cliente
                            </label>

                            <select
                                x-model="clienteSeleccionado"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 focus:border-amber-500 focus:ring-amber-500 text-sm">

                                @if($clienteConsumidorFinal)
                                <option value="{{ $clienteConsumidorFinal->id }}" selected>
                                    {{ $clienteConsumidorFinal->nombre }} {{ $clienteConsumidorFinal->apellido }}
                                </option>
                                @endif

                                @foreach($clientes as $cliente)

                                @continue($clienteConsumidorFinal && $cliente->id == $clienteConsumidorFinal->id)

                                <option value="{{ $cliente->id }}">
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                </option>

                                @endforeach

                            </select>

                            <p class="mt-2 text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">
                                Si el comprador no desea registrarse, utilice Consumidor Final.
                            </p>

                        </div>

                        <div class="h-80 border border-amber-100 rounded-xl overflow-y-auto p-3 space-y-3 bg-amber-50/20">

                            @forelse($carrito as $item)

                            <div class="bg-white rounded-xl border border-amber-100/60 p-4 shadow-sm hover:shadow-md transition-all duration-200">

                                <div class="flex justify-between items-start gap-3">

                                    <div class="min-w-0 flex-1">

                                        <div class="font-serif font-bold text-gray-900 text-sm leading-tight truncate">
                                            {{ $item['nombre'] }}
                                        </div>

                                        <div class="mt-2 inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-800 border border-amber-100">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                                            </svg>
                                            Cant: {{ $item['cantidad'] }}
                                        </div>

                                    </div>

                                    <div class="text-right shrink-0">

                                        <div class="font-mono font-bold text-amber-700 text-sm">
                                            ${{ number_format($item['subtotal'], 2, ',', '.') }}
                                        </div>

                                        <form
                                            action="{{ route('carrito.destroy', $item['id']) }}"
                                            method="POST"
                                            class="mt-2">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center justify-center px-2.5 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold rounded-lg border border-red-200 transition-all duration-200 cursor-pointer"
                                                title="Eliminar producto">

                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                            @empty

                            <div class="h-full flex items-center justify-center">
                                <div class="text-center py-10">
                                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-3 border border-amber-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-stone-400">No hay productos agregados.</p>
                                    <p class="text-xs text-stone-300 mt-1">Selecciona productos del catalogo.</p>
                                </div>
                            </div>

                            @endforelse

                        </div>

                        <div class="mt-5 pt-4 border-t border-amber-100">

                            <div class="flex justify-between items-center">
                                <span class="font-serif text-sm font-bold text-amber-950 uppercase tracking-wider">
                                    Total
                                </span>
                                <span class="text-xl font-mono font-bold text-amber-700">
                                    ${{ number_format($total, 2, ',', '.') }}
                                </span>
                            </div>

                            <form
                                action="{{ route('ventas.procesar') }}"
                                method="POST">

                                @csrf

                                <input
                                    type="hidden"
                                    name="cliente_id"
                                    :value="clienteSeleccionado">

                                <button
                                    type="submit"
                                    class="mt-5 w-full inline-flex items-center justify-center px-5 py-3 bg-amber-600 hover:bg-amber-500 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-amber-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">

                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>

                                    Procesar Venta

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </aside>

        </div>

        <!-- MODAL -->
        <x-pos.modal-cantidad />

    </div>

</x-app-layout>