<div
    x-show="mostrarModal"
    x-cloak
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div
        @click.outside="mostrarModal = false"
        class="bg-white rounded-2xl border border-amber-100 shadow-xl w-full max-w-md mx-4">

        <div class="p-6 border-b border-amber-100 bg-gradient-to-r from-gray-50 to-amber-50/30 rounded-t-2xl">
            <h2 class="font-serif text-lg font-bold text-amber-950">
                Agregar Producto
            </h2>
        </div>

        <div class="p-6 space-y-5">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 text-amber-900 font-serif font-bold rounded-xl flex items-center justify-center text-sm border border-amber-200/50 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">Producto</p>
                    <p class="font-serif font-bold text-gray-900" x-text="producto.nombre"></p>
                </div>
            </div>

            <div class="bg-amber-50/50 rounded-xl p-4 border border-amber-100">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">Precio</p>
                        <p class="text-xl font-mono font-bold text-amber-700" x-text="
                            '$ ' + Number(producto.precio).toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) +
                            (producto.categoria == 'Bebidas' ? ' / unidad' : ' / kg')
                        "></p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase">Stock disponible</p>
                        <p class="font-mono font-bold text-gray-900" x-text="producto.stock"></p>
                    </div>
                </div>
            </div>

            <div>
                <label class="block mb-2 text-xs font-sans font-bold tracking-wider text-amber-900/50 uppercase">
                    <span x-show="producto.categoria == 'Bebidas'">Cantidad</span>
                    <span x-show="producto.categoria != 'Bebidas'">Gramos</span>
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
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-amber-500 focus:ring-amber-500 transition-all duration-200">

                <p
                    x-show="!stockValido"
                    class="mt-2 text-sm text-red-600 font-semibold flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Stock insuficiente.
                </p>

                <div class="mt-5 bg-amber-50/50 rounded-xl p-4 border border-amber-100">
                    <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mb-1">Subtotal</p>
                    <p
                        class="text-2xl font-mono font-bold text-amber-700"
                        x-text="
                        '$ ' + subtotal.toLocaleString('es-AR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        })
                    "></p>
                </div>
            </div>

        </div>

        <form
            method="POST"
            action="{{ route('carrito.add') }}"
            class="px-6 pb-6">

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

            <div class="flex justify-end gap-3 pt-4 border-t border-amber-100">
                <button
                    type="button"
                    @click="mostrarModal = false"
                    class="inline-flex items-center px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-bold rounded-xl border border-gray-200 shadow-sm transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">
                    Cancelar
                </button>

                <button
                    type="submit"
                    :disabled="!stockValido"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-bold rounded-xl shadow-md transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer"
                    :class="stockValido
                        ? 'bg-amber-600 hover:bg-amber-500 text-white hover:shadow-amber-500/20'
                        : 'bg-gray-300 text-gray-500 cursor-not-allowed hover:shadow-none hover:translate-y-0'">

                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    Agregar
                </button>
            </div>

        </form>
    </div>

</div>
