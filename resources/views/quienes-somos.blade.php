<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CyberProtocol | ¿Quiénes Somos?</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-100 text-gray-800">

    {{-- Header --}}
    <header class="bg-white shadow-sm border-b border-amber-100">

        <div class="mx-auto max-w-7xl px-6 py-5 flex items-center justify-between">

            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <img src="{{ asset('images/logo.png') }}"
                    class="h-10 w-10 object-contain">

                <div>

                    <h1 class="font-serif text-xl font-bold text-amber-950">
                        CyberProtocol
                    </h1>

                    <p class="text-xs uppercase tracking-[0.30em] text-amber-700">
                        Fiambrería
                    </p>

                </div>

            </a>

            <a href="{{ url('/') }}"
                class="rounded-lg border border-amber-300 px-5 py-2 text-sm font-semibold text-amber-900 hover:bg-amber-50 transition">

                Volver al Inicio

            </a>

        </div>

    </header>

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-r from-amber-900 via-amber-800 to-stone-900 py-24">

        <div class="mx-auto max-w-6xl px-6 text-center">

            <span class="inline-block rounded-full bg-amber-500/20 px-4 py-1 text-sm font-semibold text-amber-200 mb-6">
                ¿Quiénes Somos?
            </span>

            <h1 class="font-serif text-5xl font-bold text-white">

                CyberProtocol

            </h1>

            <p class="mt-6 text-xl text-amber-100">

                Innovación · Tecnología · Trabajo en Equipo

            </p>

            <p class="mx-auto mt-8 max-w-3xl text-lg leading-8 text-amber-200">

                Somos un equipo de desarrollo comprometido con la creación de
                soluciones web modernas, intuitivas y escalables para mejorar
                la gestión de pequeños y medianos comercios.

            </p>

        </div>

    </section>

    {{-- Nuestra Empresa --}}
    <section class="py-20">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center mb-14">

                <h2 class="font-serif text-4xl font-bold text-amber-950">

                    Nuestra Empresa

                </h2>

                <div class="mx-auto mt-4 h-1 w-24 rounded-full bg-amber-600"></div>

            </div>

            <div class="rounded-3xl bg-white shadow-xl border border-amber-100 p-10">

                <p class="text-lg leading-9 text-gray-700">

                    <strong>CyberProtocol</strong> es un equipo de desarrollo de
                    software conformado por estudiantes de la Tecnicatura
                    Universitaria en Programación, enfocado en la creación de
                    aplicaciones modernas utilizando tecnologías como
                    <strong>Laravel</strong>,
                    <strong>PHP</strong>,
                    <strong>Tailwind CSS</strong> y
                    <strong>APIs REST</strong>.

                </p>

                <p class="mt-8 text-lg leading-9 text-gray-700">

                    Nuestro objetivo es desarrollar soluciones que permitan
                    optimizar procesos administrativos y comerciales,
                    combinando buenas prácticas de programación, metodologías
                    ágiles y una experiencia de usuario intuitiva.

                </p>

            </div>

        </div>

    </section>

    {{-- ===========================
    Nuestro Proyecto
    =========================== --}}
    <section class="py-20 bg-gradient-to-b from-amber-50 to-white">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center mb-14">

                <span class="text-sm font-bold uppercase tracking-[0.30em] text-amber-600">
                    Nuestro Proyecto
                </span>

                <h2 class="mt-3 font-serif text-4xl font-bold text-amber-950">
                    Sistema de Gestión para Fiambrería
                </h2>

                <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-gray-600">
                    Desarrollamos una plataforma web moderna para optimizar la administración
                    integral de una fiambrería, centralizando la gestión de productos,
                    clientes y ventas mediante una interfaz intuitiva e integración con
                    servicios externos.
                </p>

            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📦</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Productos
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Administración completa del inventario con imágenes, stock,
                        fechas de elaboración y vencimiento.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🧀</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Categorías
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Organización inteligente de productos para facilitar la
                        búsqueda y administración del inventario.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">👥</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Clientes
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Registro de clientes habituales y consumidor final para una
                        gestión comercial más eficiente.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">💰</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Punto de Venta
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Proceso de venta intuitivo con cálculo automático,
                        control de stock y generación del detalle de venta.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🌐</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Integración de APIs
                    </h3>
                    <p class="mt-3 text-gray-600">
                        El sistema consume APIs externas para mostrar la cotización
                        del dólar, el clima y completar automáticamente productos
                        mediante OpenFoodFacts.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-amber-100 shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📊</div>
                    <h3 class="font-serif text-xl font-bold text-amber-900">
                        Dashboard
                    </h3>
                    <p class="mt-3 text-gray-600">
                        Panel administrativo diseñado para ofrecer una experiencia
                        rápida, clara y completamente responsive.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===========================
    Nuestro Equipo
    =========================== --}}
    <section class="py-20 bg-stone-100">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center mb-14">

                <span class="text-sm font-bold uppercase tracking-[0.30em] text-amber-600">
                    Nuestro Equipo
                </span>

                <h2 class="mt-3 font-serif text-4xl font-bold text-amber-950">
                    Conocé a CyberProtocol
                </h2>

                <p class="mx-auto mt-6 max-w-3xl text-lg text-gray-600">
                    Un equipo multidisciplinario comprometido con el desarrollo de
                    soluciones innovadoras mediante trabajo colaborativo y tecnologías modernas.
                </p>

            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">

                {{-- Laura --}}
                <div class="bg-white rounded-3xl shadow-lg border border-amber-100 p-6 text-center hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                    <div class="mx-auto w-24 h-24 rounded-full bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-white text-4xl shadow-lg">
                        👩
                    </div>

                    <h3 class="mt-6 font-serif text-xl font-bold text-amber-950">
                        Laura
                    </h3>

                    <p class="text-sm font-semibold text-amber-700">
                        Project Manager
                    </p>

                    <p class="mt-2 text-xs text-gray-500">
                        Backend Developer
                    </p>

                    <ul class="mt-6 space-y-2 text-sm text-gray-700 text-left">

                        <li>✔ Gestión del Proyecto</li>
                        <li>✔ Base de Datos</li>
                        <li>✔ Migraciones</li>
                        <li>✔ Modelos</li>
                        <li>✔ Integración de APIs</li>

                    </ul>

                </div>

                {{-- Fernando --}}
                <div class="bg-white rounded-3xl shadow-lg border border-amber-100 p-6 text-center hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                    <div class="mx-auto w-24 h-24 rounded-full bg-gradient-to-br from-stone-500 to-stone-700 flex items-center justify-center text-white text-4xl shadow-lg">
                        👨
                    </div>

                    <h3 class="mt-6 font-serif text-xl font-bold text-amber-950">
                        Fernando
                    </h3>

                    <p class="text-sm font-semibold text-amber-700">
                        Backend Developer
                    </p>

                    <ul class="mt-6 space-y-2 text-sm text-gray-700 text-left">

                        <li>✔ Controladores</li>
                        <li>✔ API REST</li>
                        <li>✔ Lógica de Negocio</li>
                        <li>✔ Validaciones</li>

                    </ul>

                </div>

                {{-- Alejandro --}}
                <div class="bg-white rounded-3xl shadow-lg border border-amber-100 p-6 text-center hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                    <div class="mx-auto w-24 h-24 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-4xl shadow-lg">
                        👨‍💻
                    </div>

                    <h3 class="mt-6 font-serif text-xl font-bold text-amber-950">
                        Alejandro
                    </h3>

                    <p class="text-sm font-semibold text-amber-700">
                        Frontend Developer
                    </p>

                    <ul class="mt-6 space-y-2 text-sm text-gray-700 text-left">

                        <li>✔ Blade</li>
                        <li>✔ Navegación</li>
                        <li>✔ Interfaces</li>
                        <li>✔ Responsive</li>

                    </ul>

                </div>

                {{-- Micaela --}}
                <div class="bg-white rounded-3xl shadow-lg border border-amber-100 p-6 text-center hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                    <div class="mx-auto w-24 h-24 rounded-full bg-gradient-to-br from-pink-500 to-pink-700 flex items-center justify-center text-white text-4xl shadow-lg">
                        👩‍🎨
                    </div>

                    <h3 class="mt-6 font-serif text-xl font-bold text-amber-950">
                        Micaela
                    </h3>

                    <p class="text-sm font-semibold text-amber-700">
                        UI / UX Developer
                    </p>

                    <ul class="mt-6 space-y-2 text-sm text-gray-700 text-left">

                        <li>✔ Tailwind CSS</li>
                        <li>✔ Diseño UI</li>
                        <li>✔ Responsive</li>
                        <li>✔ Experiencia de Usuario</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    {{-- ===========================
    CyberProtocol en Números
=========================== --}}
    <section class="py-20 bg-gradient-to-r from-amber-900 via-amber-800 to-stone-900">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center">

                <span class="text-sm font-bold uppercase tracking-[0.30em] text-amber-300">
                    CyberProtocol en Números
                </span>

                <h2 class="mt-4 font-serif text-4xl font-bold text-white">
                    Un proyecto desarrollado con tecnología y trabajo colaborativo
                </h2>

                <p class="mx-auto mt-6 max-w-3xl text-lg text-amber-100">
                    Nuestro sistema integra herramientas modernas de desarrollo,
                    arquitectura basada en APIs y una interfaz pensada para brindar
                    una experiencia rápida, intuitiva y eficiente.
                </p>

            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-3xl bg-white/10 backdrop-blur-md border border-white/10 p-8 text-center">

                    <h3 class="text-5xl font-bold text-amber-300">
                        4
                    </h3>

                    <p class="mt-3 text-white font-semibold">
                        Desarrolladores
                    </p>

                </div>

                <div class="rounded-3xl bg-white/10 backdrop-blur-md border border-white/10 p-8 text-center">

                    <h3 class="text-5xl font-bold text-amber-300">
                        6
                    </h3>

                    <p class="mt-3 text-white font-semibold">
                        Módulos Principales
                    </p>

                </div>

                <div class="rounded-3xl bg-white/10 backdrop-blur-md border border-white/10 p-8 text-center">

                    <h3 class="text-5xl font-bold text-amber-300">
                        3
                    </h3>

                    <p class="mt-3 text-white font-semibold">
                        APIs Integradas
                    </p>

                </div>

                <div class="rounded-3xl bg-white/10 backdrop-blur-md border border-white/10 p-8 text-center">

                    <h3 class="text-5xl font-bold text-amber-300">
                        100%
                    </h3>

                    <p class="mt-3 text-white font-semibold">
                        Responsive
                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- ===========================
    Tecnologías Utilizadas
=========================== --}}
    <section class="py-20 bg-white">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center mb-14">

                <span class="text-sm font-bold uppercase tracking-[0.30em] text-amber-600">
                    Tecnologías
                </span>

                <h2 class="mt-3 font-serif text-4xl font-bold text-amber-950">
                    Herramientas utilizadas durante el desarrollo
                </h2>

                <p class="mx-auto mt-6 max-w-3xl text-lg text-gray-600">
                    El sistema fue desarrollado utilizando tecnologías modernas,
                    herramientas de gestión y servicios externos que garantizan
                    una aplicación robusta, escalable y fácil de mantener.
                </p>

            </div>

            <div class="flex flex-wrap justify-center gap-4">

                <span class="rounded-full bg-red-100 px-5 py-3 font-semibold text-red-700 shadow">
                    Laravel
                </span>

                <span class="rounded-full bg-blue-100 px-5 py-3 font-semibold text-blue-700 shadow">
                    PHP 8.4
                </span>

                <span class="rounded-full bg-cyan-100 px-5 py-3 font-semibold text-cyan-700 shadow">
                    Tailwind CSS
                </span>

                <span class="rounded-full bg-indigo-100 px-5 py-3 font-semibold text-indigo-700 shadow">
                    Livewire
                </span>

                <span class="rounded-full bg-purple-100 px-5 py-3 font-semibold text-purple-700 shadow">
                    Alpine.js
                </span>

                <span class="rounded-full bg-green-100 px-5 py-3 font-semibold text-green-700 shadow">
                    SQLite
                </span>

                <span class="rounded-full bg-gray-200 px-5 py-3 font-semibold text-gray-800 shadow">
                    GitHub
                </span>

                <span class="rounded-full bg-sky-100 px-5 py-3 font-semibold text-sky-700 shadow">
                    Jira
                </span>

                <span class="rounded-full bg-orange-100 px-5 py-3 font-semibold text-orange-700 shadow">
                    REST API
                </span>

                <span class="rounded-full bg-yellow-100 px-5 py-3 font-semibold text-yellow-700 shadow">
                    OpenFoodFacts
                </span>

                <span class="rounded-full bg-teal-100 px-5 py-3 font-semibold text-teal-700 shadow">
                    Open-Meteo
                </span>

                <span class="rounded-full bg-emerald-100 px-5 py-3 font-semibold text-emerald-700 shadow">
                    DolarAPI
                </span>

            </div>

        </div>

    </section>

    {{-- ===========================
    Footer
=========================== --}}
    <footer class="bg-gradient-to-r from-stone-900 via-amber-950 to-stone-900 text-white">

        <div class="mx-auto max-w-6xl px-6 py-16">

            <div class="text-center">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="CyberProtocol"
                    class="mx-auto h-20 w-20 mb-6">

                <h2 class="font-serif text-4xl font-bold text-amber-300">
                    CyberProtocol
                </h2>

                <p class="mt-4 text-lg text-amber-100 italic">
                    Transformando ideas en soluciones tecnológicas.
                </p>

                <div class="mx-auto mt-8 h-1 w-24 rounded-full bg-amber-500"></div>

            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-3">

                {{-- Proyecto --}}
                <div>

                    <h3 class="font-serif text-xl font-bold text-amber-300 mb-4">
                        Proyecto
                    </h3>

                    <p class="text-gray-300 leading-8">
                        Sistema de Gestión para Fiambrería desarrollado
                        como proyecto académico utilizando una arquitectura
                        moderna basada en Laravel, APIs REST y buenas
                        prácticas de desarrollo.
                    </p>

                </div>

                {{-- Tecnologías --}}
                <div>

                    <h3 class="font-serif text-xl font-bold text-amber-300 mb-4">
                        Tecnologías
                    </h3>

                    <ul class="space-y-2 text-gray-300">

                        <li>• Laravel 12</li>
                        <li>• PHP 8.4</li>
                        <li>• SQLite</li>
                        <li>• Tailwind CSS</li>
                        <li>• Livewire</li>
                        <li>• Alpine.js</li>

                    </ul>

                </div>

                {{-- Integraciones --}}
                <div>

                    <h3 class="font-serif text-xl font-bold text-amber-300 mb-4">
                        Integraciones
                    </h3>

                    <ul class="space-y-2 text-gray-300">

                        <li>• DolarAPI</li>
                        <li>• Open-Meteo</li>
                        <li>• OpenFoodFacts</li>
                        <li>• GitHub</li>
                        <li>• Jira</li>

                    </ul>

                </div>

            </div>

            <div class="mt-14 border-t border-amber-800 pt-8">

                <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                    <p class="text-sm text-gray-400">
                        © {{ date('Y') }} <strong>CyberProtocol</strong>. Todos los derechos reservados.
                    </p>

                    <p class="text-sm text-gray-400">
                        Tecnicatura Universitaria en Programación
                    </p>

                </div>

            </div>

        </div>

    </footer>
</body>

</html>