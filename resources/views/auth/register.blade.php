<x-guest-layout>
    <div class="mb-6 w-full flex flex-col justify-center items-center bg-amber-50/40 p-2 sm:p-6 md:p-10">
        <div class="w-full max-w-[280px] sm:max-w-3x1 md:max-w-4xl bg-amber-50/20 rounded-3xl border border-amber-100 shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-1 transition-all duration-300">
            <div class="bg-gradient-to-br from-amber-800 to-amber-950 p-8 md:p-12 flex flex-col justify-center relative min-h-[180px] md:min-h-full">
                <div class="relative z-10 text-center md:text-left">

                    <h2 class="font-serif text-2xl md:text-2xl lg:text-2xl font-bold text-amber-100 leading-tight tracking-wide">
                        <!-- text-2xl font-bold text-gray-800 tracking-tight"> -->
                        CyberProtocol Fiambrería
                    </h2>
                    <p class="mt-3 md:mt-3 text-amber-200/80 text-xs md:text-sm font-sans italic max-w-sm mx-auto md:mx-0">
                        <!-- text-sm text-gray-500 mt-1"> -->
                        {{ __('Crea una cuenta para registrar un nuevo usuario administrador') }}
                    </p>
                </div>
                <div class="absolute inset-0 bg-black/10 pointer-events-none"></div>
            </div>
            <div class="p-6 sm:p-8 md:p-12 flex flex-col justify-center bg-amber-50/60 border-l border-amber-100/50">
                <div class="w-full">
                    <!-- Formulario de Registro -->

                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nombre Completo')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="name" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ej. Alejandro Quiroga" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 bro" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo Electrónico')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="email" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="usuario@cyberprotocol.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="password" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="password" name="password" required autocomplete="new-password" placeholder="Crea una contraseña segura" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="password_confirmation" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repite la contraseña" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Navegación y Botones Ajustados -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-4 border-t border-amber-200/40 mt-6">
                            <a class="text-xs text-amber-800 hover:text-amber-950 font-medium underline transition-colors" href="{{ route('login') }}">
                                {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                            </a>

                            <x-primary-button class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-serif font-bold text-sm rounded-xl shadow-md hover:shadow-lg transform active:scale-[0.98] transition-all whitespace-nowrap">
                                {{ __('Registrarse') }}
                            </x-primary-button>
                        </div>
                    </form>
</x-guest-layout>