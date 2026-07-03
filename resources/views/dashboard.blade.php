<x-app-layout>

    <div
        class="p-6"
        x-data="{
            mostrarModal: false,

            mensaje: 'Hola Alpine',

            producto: {
                id: '',
                nombre: '',
                precio: '',
                categoria: ''
            },

            cantidad: '',

            subtotal: 0,

            calcularSubtotal() {

                if(this.cantidad == '' || this.cantidad <= 0){

                    this.subtotal = 0;
                    return;

                }

                if(this.producto.categoria == 'Bebidas'){

                    this.subtotal = this.producto.precio * this.cantidad;

                }else{

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

                <p class="text-stone-500 mt-1 mb-6">
                    Seleccione los productos para comenzar una nueva venta.
                </p>

                <!-- Buscador -->
                <div class="relative">

                    <span class="absolute left-4 top-3 text-stone-400">

                        🔍

                    </span>

                    <input
                        type="text"
                        placeholder="Buscar productos..."
                        class="w-full rounded-xl border border-stone-300 pl-12 pr-4 py-3 focus:ring-amber-600 focus:border-amber-600">

                </div>

                <!-- Categorías -->

                <div class="flex gap-3 mb-6 flex-wrap">

                    <button
                        class="rounded-full bg-amber-700 text-white px-5 py-2 shadow hover:bg-amber-800">

                        Todos

                    </button>

                    <button
                        class="rounded-full border border-stone-300 bg-white px-5 py-2 hover:bg-stone-100 transition">

                        Fiambres

                    </button>

                    <button
                        class="rounded-full border border-stone-300 bg-white px-5 py-2 hover:bg-stone-100 transition">

                        Quesos

                    </button>

                    <button
                        class="rounded-full border border-stone-300 bg-white px-5 py-2 hover:bg-stone-100 transition">

                        Embutidos

                    </button>

                    <button
                        class="rounded-full border border-stone-300 bg-white px-5 py-2 hover:bg-stone-100 transition">

                        Bebidas

                    </button>

                </div>

                <!-- Acá irán las tarjetas -->

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($productos as $producto)

                    <x-pos.producto-card
                        :producto="$producto" />

                    @endforeach

                </div>

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

                        <button
                            class="mt-6 w-full bg-amber-700 hover:bg-amber-800 text-white py-3 rounded-lg">

                            Procesar Venta

                        </button>

                    </div>

                </div>

            </aside>

        </div>

        <!-- PEGAR EL MODAL COMPLETO ACÁ -->
        <x-pos.modal-cantidad />

    </div>


</x-app-layout>