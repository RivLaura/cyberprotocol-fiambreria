<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CyberProtocol') }} - Fiambrer&iacute;a</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
    @endif
</head>

<body class="min-h-screen bg-stone-100 text-stone-800 antialiased">
    <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-amber-50 via-stone-100 to-amber-100/70"></div>

        <div class="pointer-events-none absolute inset-0 opacity-40">
            <div class="absolute left-0 top-0 h-full w-full bg-[linear-gradient(90deg,rgba(120,53,15,0.05)_1px,transparent_1px),linear-gradient(rgba(120,53,15,0.04)_1px,transparent_1px)] bg-[size:44px_44px]"></div>
        </div>

        <header class="relative z-10 px-6 py-5">
            <div class="mx-auto flex max-w-6xl items-center justify-between gap-4">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="CyberProtocol" class="h-10 w-10 object-contain">
                    <div>
                        <p class="font-serif text-lg font-bold leading-tight text-amber-950">CyberProtocol</p>
                        <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-amber-700/70">Fiambrer&iacute;a</p>
                    </div>
                </a>

                @if (Route::has('login'))
                <nav class="flex items-center gap-3">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-lg bg-amber-700 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-amber-900/20 transition hover:bg-amber-600">
                        Ir al panel
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg border border-amber-300 bg-white/70 px-5 py-2.5 text-sm font-semibold text-amber-900 transition hover:border-amber-500 hover:bg-white">
                        Ingresar
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hidden items-center justify-center rounded-lg bg-amber-700 px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-amber-900/20 transition hover:bg-amber-600 sm:inline-flex">
                        Registrarse
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </div>
        </header>

        <main class="relative z-10 px-6 pb-20">
            <section class="mx-auto grid min-h-[calc(100vh-112px)] max-w-6xl items-center gap-10 py-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div>
                    <p class="mb-4 text-sm font-extrabold uppercase tracking-[0.22em] text-amber-700">
                        Bienvenido/a
                    </p>

                    <h1 class="max-w-xl font-serif text-5xl font-black leading-tight text-amber-950 sm:text-6xl">
                        Gesti&oacute;n profesional para tu fiambrer&iacute;a
                    </h1>

                    <p class="mt-5 max-w-lg text-lg leading-8 text-stone-600">
                        Control&aacute; productos, stock, clientes y ventas desde un panel claro, moderno y pensado para el ritmo diario del negocio.
                    </p>

                    <div class="mt-6 h-1 w-16 rounded-full bg-amber-600"></div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-amber-600 text-white shadow-md shadow-amber-900/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="m21 8-9-5-9 5 9 5 9-5Zm0 0v8l-9 5-9-5V8m9 5v8" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="font-bold text-stone-950">Cat&aacute;logo ordenado</h2>
                                <p class="mt-1 text-sm leading-6 text-stone-600">Productos y categor&iacute;as siempre disponibles.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-amber-600 text-white shadow-md shadow-amber-900/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M4 19V5m0 14h16M8 15l3-3 3 2 5-7" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="font-bold text-stone-950">Stock actualizado</h2>
                                <p class="mt-1 text-sm leading-6 text-stone-600">Alertas y movimientos para decidir r&aacute;pido.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-amber-600 text-white shadow-md shadow-amber-900/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="font-bold text-stone-950">Ventas m&aacute;s &aacute;giles</h2>
                                <p class="mt-1 text-sm leading-6 text-stone-600">Un punto de venta simple para operar mejor.</p>
                            </div>
                        </div>
                    </div>

                    @if (Route::has('login'))
                    @guest
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg bg-amber-700 px-8 py-3.5 text-base font-bold text-white shadow-lg shadow-amber-900/20 transition hover:-translate-y-0.5 hover:bg-amber-600">
                            Iniciar sesi&oacute;n
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-lg border border-amber-300 bg-white/70 px-8 py-3.5 text-base font-bold text-amber-950 transition hover:-translate-y-0.5 hover:border-amber-500 hover:bg-white">
                            Crear cuenta
                        </a>
                        @endif
                    </div>
                    @endguest
                    @endif
                </div>

                <div class="relative h-[620px] overflow-hidden">

                    <!-- Imagen -->
                    <img
                        src="{{ asset('images/portada-fiambreria.png') }}"
                        alt="CyberProtocol"
                        class="absolute -right-20 top-0 h-[115%] w-[115%] object-cover">

                    <!-- Luz cálida -->
                    <div
                        class="absolute -right-40 -top-40
                        h-[700px] w-[700px]
                        rounded-full
                        bg-amber-300/20
                        blur-[180px]">
                    </div>

                    <!-- Difuminado lateral -->
                    <div
                        class="absolute inset-y-0 left-0 w-[45%]
                        bg-gradient-to-r
                        from-stone-100
                        via-stone-100/90
                        via-stone-100/55
                        to-transparent">
                    </div>

                    <!-- Difuminado inferior -->
                    <div
                        class="absolute bottom-0 left-0 right-0 h-36
                        bg-gradient-to-t
                        from-stone-100
                        to-transparent">
                    </div>

                    <!-- Viñeta -->
                    <div
                        class="absolute inset-0
                        bg-[radial-gradient(circle_at_75%_50%,transparent_45%,rgba(245,245,244,.18)_100%)]">
                    </div>

                </div>
            </section>
        </main>

        <footer class="relative z-10 border-t border-amber-200/60 px-6 py-5">
            <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-2 text-center sm:flex-row">
                <p class="text-xs text-amber-900/50">&copy; {{ date('Y') }} CyberProtocol. Todos los derechos reservados.</p>
                <p class="font-serif text-sm italic text-amber-950/70">La calidad de tus productos es la clave de tus mejores ventas.</p>
            </div>
        </footer>
    </div>
</body>

</html>