<x-app-layout>

    <div class="p-6">

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
                <div class="bg-white rounded-xl shadow p-5 mb-5">

                    <input
                        type="text"
                        placeholder="Buscar producto..."
                        class="w-full rounded-lg border border-stone-300 px-4 py-3 focus:ring-amber-500 focus:border-amber-600">

                </div>

                <!-- Categorías -->

                <div class="flex gap-3 mb-6 flex-wrap">

                    <button class="bg-amber-700 text-white px-5 py-2 rounded-full">
                        Todos
                    </button>

                    <button class="bg-white border px-5 py-2 rounded-full">
                        Fiambres
                    </button>

                    <button class="bg-white border px-5 py-2 rounded-full">
                        Quesos
                    </button>

                    <button class="bg-white border px-5 py-2 rounded-full">
                        Embutidos
                    </button>

                    <button class="bg-white border px-5 py-2 rounded-full">
                        Bebidas
                    </button>

                </div>

                <!-- Acá irán las tarjetas -->

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

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

                    <div
                        class="h-80 border rounded-lg flex items-center justify-center text-stone-400">

                        Aquí aparecerán los productos seleccionados.

                    </div>

                    <div class="mt-6 border-t pt-5">

                        <div
                            class="flex justify-between text-lg font-bold">

                            <span>

                                Total

                            </span>

                            <span>

                                $0,00

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

    </div>

</x-app-layout>