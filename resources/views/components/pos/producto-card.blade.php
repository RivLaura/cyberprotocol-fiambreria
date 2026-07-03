<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @props(['producto'])

    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-stone-200">

        <!-- Imagen temporal -->
        <div class="h-36 bg-gradient-to-br from-amber-100 to-amber-50 flex items-center justify-center">

            <span class="text-6xl">

                🧀

            </span>

        </div>

        <div class="p-5">

            <h3 class="text-lg font-bold text-stone-800">

                {{ $producto->nombre }}

            </h3>

            <p class="text-sm text-stone-500 mt-1">

                {{ $producto->categoria->nombre }}

            </p>

            <div class="mt-4 space-y-2">

                <div class="flex justify-between">

                    <span class="text-stone-500">

                        Precio

                    </span>

                    <span class="font-semibold text-amber-700">

                        ${{ number_format($producto->precio,0,',','.') }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-stone-500">

                        Stock

                    </span>

                    <span class="font-semibold">

                        {{ $producto->stock }}

                    </span>

                </div>

            </div>

            <button
                class="mt-6 w-full rounded-xl bg-amber-700 hover:bg-amber-800 text-white py-2 transition">

                Agregar

            </button>

        </div>

    </div>
</body>

</html>