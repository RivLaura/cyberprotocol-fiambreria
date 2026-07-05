<header class="fixed top-0 left-0 right-0 z-40 bg-gradient-to-r from-amber-900 to-amber-700 shadow-lg border-b border-amber-600/20">

    <div class="mx-auto flex h-16 items-center justify-between px-3 sm:px-6">

        {{-- Logo + Nombre del sistema --}}
        <div class="flex items-center gap-2 sm:gap-4">

            {{-- Botón hamburguesa para mobile --}}
            <button @click="sidebarOpen = !sidebarOpen" class="md:hidden flex items-center justify-center w-11 h-11 rounded-lg text-amber-200 hover:bg-amber-700/50 hover:text-white transition-all duration-200 cursor-pointer shrink-0">
                <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="sidebarOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="flex h-10 w-10 sm:h-14 sm:w-14 items-center justify-center rounded-xl overflow-hidden shrink-0">
                <img src="{{ asset('images/logo.png') }}" class="h-8 w-8 sm:h-12 sm:w-12 object-contain">
            </div>

            <div class="border-l border-amber-500/30 pl-2 sm:pl-4">

                <h1 class="font-serif text-base sm:text-xl tracking-wide text-white leading-tight">
                    CyberProtocol
                </h1>

                <p class="hidden sm:block text-[11px] font-sans font-bold tracking-wider text-amber-200/70 uppercase leading-tight mt-0.5">
                    Sistema de Gestión para Fiambrería
                </p>

            </div>

        </div>

        {{-- Usuario --}}
        <div x-data="{ open: false }" class="relative">

            <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-3 cursor-pointer">

                <div class="text-right">

                    <p class="text-sm font-bold text-white leading-tight">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-[10px] font-sans font-bold tracking-wider text-amber-200/60 uppercase leading-tight mt-0.5">
                        Vendedor/a
                    </p>

                </div>

                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 shadow-inner flex items-center justify-center text-white font-bold text-sm ring-2 ring-amber-300/30 shrink-0 overflow-hidden">
                    @if(Auth::user()->profile_photo_url)
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                    @else
                    {{ Str::substr(Auth::user()->name, 0, 1) }}
                    @endif
                </div>

            </button>

            <div x-show="open" x-cloak @click.outside="open = false" class="absolute right-0 mt-2 w-52 bg-white rounded-2xl border border-amber-100 shadow-xl overflow-hidden z-50">

                <div class="px-5 py-4 border-b border-amber-100 bg-gradient-to-r from-gray-50 to-amber-50/30">
                    <p class="font-serif font-bold text-amber-950 text-sm leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] font-sans font-bold tracking-wider text-amber-900/50 uppercase mt-0.5">{{ Auth::user()->email }}</p>
                </div>

                <div class="p-2">

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-amber-50 hover:text-amber-900 transition-all duration-200">

                        <svg class="w-4 h-4 shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 transition-all duration-200 cursor-pointer">

                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Cerrar Sesión
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</header>