<div
    x-show="mostrarModal"
    x-cloak
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div
        @click.outside="mostrarModal = false"
        class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-2xl font-bold text-stone-800 mb-6">

            Agregar Producto

        </h2>

        <div class="space-y-4">

            <div>

                <label class="text-sm text-stone-500">
                    Producto
                </label>

                <p
                    class="text-xl font-semibold"
                    x-text="producto.nombre">
                </p>


            </div>

            <div>

                <label class="text-sm text-stone-500">
                    Precio
                </label>

                <p
                    class="text-xl font-bold text-amber-700"
                    x-text="
                            '$ ' + producto.precio +
                            (producto.categoria == 'Bebidas'
                                ? ' / unidad'
                                : ' / kg')
                        ">
                </p>

            </div>

            <div>

                <label class="block mb-2 font-medium">

                    <span x-show="producto.categoria == 'Bebidas'">
                        Cantidad
                    </span>

                    <span x-show="producto.categoria != 'Bebidas'">
                        Gramos
                    </span>

                </label>

                <input
                    type="number"
                    min="1"
                    x-model="cantidad"
                    @input="calcularSubtotal()"
                    x-bind:placeholder="
                        producto.categoria == 'Bebidas'
                            ? 'Ingrese cantidad'
                            : 'Ingrese gramos'
                    "
                    class="w-full rounded-lg border border-stone-300 px-3 py-2">

                <p
                    x-show="!stockValido"
                    class="mt-2 text-sm text-red-600 font-semibold">

                    ❌ Stock insuficiente.

                </p>

                <div class="mt-4">

                    <label class="text-sm text-stone-500">

                        Subtotal

                    </label>

                    <p
                        class="text-2xl font-bold text-amber-700"
                        x-text="
                        '$ ' + subtotal.toLocaleString('es-AR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })
                    ">

                    </p>

                </div>
            </div>

        </div>

        <form
            method="POST"
            action="{{ route('carrito.add') }}"
            class="mt-8">

            @csrf

            <input
                type="hidden"
                name="producto_id"
                :value="producto.id">

            <input
                type="hidden"
                name="cantidad"
                :value="cantidad">

            <input
                type="hidden"
                name="subtotal"
                :value="subtotal">

            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    @click="mostrarModal = false"
                    class="px-5 py-2 rounded-lg border">

                    Cancelar

                </button>

                <button
                    type="submit"
                    :disabled="!stockValido"
                    class="px-5 py-2 rounded-lg text-white"
                    :class="stockValido
                        ? 'bg-amber-700 hover:bg-amber-800'
                        : 'bg-gray-400 cursor-not-allowed'">

                    Agregar

                </button>

            </div>

        </form>
    </div>

</div>