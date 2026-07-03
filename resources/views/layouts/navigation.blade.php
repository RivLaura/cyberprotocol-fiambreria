<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                        Categorías
                    </x-nav-link>

                    <!-- TRAZABILIDAD JIRA: FIAMB-97 - Enlace dinámico al módulo de Productos -->
                    <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')">
                        Productos
                    </x-nav-link>

                    <x-nav-link :href="route('ventas.index')" :active="request()->routeIs('ventas.*')">
                        Ventas
                    </x-nav-link>

                </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-8">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Corregido: Texto plano en español -->
                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="block w-full p-1">
                            @csrf
                            <button type="submit"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="w-full flex items-center justify-between text-left px-4 py-2 text-sm leading-5 text-amber-950 hover:text-white bg-transparent hover:bg-amber-700 rounded-lg transition-all duration-150 group">
                                <span class="font-sans font-medium">
                                    Cerrar Sesión
                                </span>
                                <!-- Icono de puerta de salida (SVG) -->
                                <svg class="w-4 h-4 text-amber-800 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>

                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-nav-link>

            <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
                Categorías
            </x-nav-link>

            <!-- TRAZABILIDAD JIRA: FIAMB-97 - Menú responsivo de Productos -->
            <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.*')">
                Productos
            </x-nav-link>

            <x-nav-link :href="route('ventas.index')" :active="request()->routeIs('ventas.*')">
                Ventas
            </x-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Corregido: Texto plano en español -->
                <x-responsive-nav-link :href="route('profile.edit')">
                    Perfil
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" class="px-2 pt-2 pb-1">
                    @csrf
                    <button type="submit"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="w-full flex items-center justify-between px-4 py-2.5 bg-amber-50/60 hover:bg-amber-700 text-amber-950 hover:text-white font-medium text-sm rounded-xl border border-amber-200/40 shadow-sm transition-all duration-150 group">

                        <!-- Texto del enlace corregido -->
                        <span class="font-sans tracking-wide">
                            Cerrar Sesión
                        </span>

                        <!-- Icono minimalista de puerta de salida (SVG) -->
                        <svg class="w-4 h-4 text-amber-800 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>

                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>