<x-app-layout>

    <div
        class="p-6"
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
        }">

        <div class="grid grid-cols-12 gap-6">

            <!-- ========================= -->
            <!-- PANEL IZQUIERDO -->
            <!-- ========================= -->
            <section class="col-span-8">

                <h1 class="text-3xl font-bold text-stone-800">
                    Punto de Venta
                </h1>

                @if(session('error'))

                <div class="mt-4 mb-4 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

                    {{ session('error') }}

                </div>

                @endif

                @if(session('success'))

                <div class="mt-4 mb-4 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

                    {{ session('success') }}

                </div>

                @endif

                <p class="text-stone-500 mt-1 mb-6">
                    Seleccione los productos para comenzar una nueva venta.
                </p>

                <!-- Acá irán las tarjetas -->
                <livewire:pos.catalogo-productos />

            </section>

            <!-- ========================= -->
            <!-- PANEL DERECHO -->
            <!-- ========================= -->

            <aside class="col-span-4">

                <div class="bg-white rounded-xl shadow p-6 sticky top-6">

                    <h2 class="text-xl font-bold text-stone-800 mb-5">

                        Detalle de Venta

                    </h2>

                    <div class="mb-5">

                        <label class="block mb-2 font-medium">

                            Cliente

                        </label>

                        <select
                            x-model="clienteSeleccionado"
                            class="w-full rounded-lg border border-stone-300 px-3 py-2">

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

                        <p class="mt-2 text-xs text-stone-500">
                            Si el comprador no desea registrarse, utilice Consumidor Final.
                        </p>

                    </div>

                    <div class="h-80 border rounded-lg overflow-y-auto p-4">

                        @forelse($carrito as $item)

                        <div class="border rounded-lg p-3 mb-3">

                            <div class="flex justify-between items-start">

                                <div>

                                    <div class="font-semibold">
                                        {{ $item['nombre'] }}
                                    </div>

                                    <div class="text-sm text-stone-500 mt-1">

                                        Cantidad:
                                        {{ $item['cantidad'] }}

                                    </div>

                                </div>

                                <div class="text-right">

                                    <div class="font-semibold text-amber-700 mb-2">
                                        $ {{ number_format($item['subtotal'], 2, ',', '.') }}
                                    </div>

                                    <form
                                        action="{{ route('carrito.destroy', $item['id']) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="text-red-600 hover:text-red-800 text-xl"
                                            title="Eliminar producto">

                                            🗑️

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                        @empty

                        <div class="h-full flex items-center justify-center text-stone-400">

                            No hay productos agregados.

                        </div>

                        @endforelse

                    </div>


                    <div class="mt-6 border-t pt-5">

                        <div
                            class="flex justify-between text-lg font-bold">

                            <span>

                                Total

                            </span>

                            <span>

                                $ {{ number_format($total, 2, ',', '.') }}

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
                                class="mt-6 w-full bg-amber-700 hover:bg-amber-800 text-white py-3 rounded-lg w-full">

                                Procesar Venta

                            </button>

                        </form>
                    </div>

                </div>

            </aside>

        </div>

        <!-- PEGAR EL MODAL COMPLETO ACÁ -->
        <x-pos.modal-cantidad />

    </div>


</x-app-layout>