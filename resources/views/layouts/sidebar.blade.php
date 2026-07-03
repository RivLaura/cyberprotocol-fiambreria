<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <aside class="w-64 min-h-screen bg-gradient-to-b from-amber-900 to-stone-800 shadow-lg">

        <nav class="mt-8">

            <ul class="space-y-2 px-4">

                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block rounded-lg px-4 py-3 text-white hover:bg-amber-700 transition">
                        🏠 Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('categorias.index') }}"
                        class="block rounded-lg px-4 py-3 text-white hover:bg-amber-700 transition">
                        📂 Categorías
                    </a>
                </li>

                <li>
                    <a href="{{ route('productos.index') }}"
                        class="block rounded-lg px-4 py-3 text-white hover:bg-amber-700 transition">
                        🧀 Productos
                    </a>
                </li>

                <li>
                    <a href="{{ route('clientes.index') }}"
                        class="block rounded-lg px-4 py-3 text-white hover:bg-amber-700 transition">
                        👥 Clientes
                    </a>
                </li>

                <li>
                    <a href="{{ route('ventas.index') }}"
                        class="block rounded-lg px-4 py-3 text-white hover:bg-amber-700 transition">
                        🧾 Ventas
                    </a>
                </li>

            </ul>

        </nav>

    </aside>
</body>

</html>