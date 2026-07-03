<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="bg-gradient-to-r from-amber-900 to-amber-700 shadow-lg">

        <div class="mx-auto flex h-16 items-center justify-between px-6">

            {{-- Logo + Nombre del sistema --}}
            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-md">

                    <span class="text-2xl">
                        🧀
                    </span>

                </div>

                <div>

                    <h1 class="text-xl font-bold text-white">
                        CyberProtocol
                    </h1>

                    <p class="text-sm text-amber-100">
                        Sistema de Gestión para Fiambrería
                    </p>

                </div>

            </div>

            {{-- Usuario --}}
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="font-semibold text-white">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-amber-100">
                        Vendedor/a
                    </p>

                </div>

            </div>

        </div>

    </header>
</body>

</html>