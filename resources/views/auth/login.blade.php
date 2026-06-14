<x-guest-layout>
    <!-- Encabezado del sistema -->
      <div class="min-h-screen flex flex-col justify-center items-center bg-amber-50/40 p-6 md:p-12 lg:p-16">
        <div class="w-full max-w-md lg:max-w-5xl bg-white rounded-3xl border border-amber-100 shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-1 transition-all duration-300">
        <div class="bg-gradient-to-br from-amber-800 to-amber-950 p-8 md:p-10 lg:p-12 flex flex-col justify-center relative">
            <div class="relative z-10 text-center lg:text-left">
        <h2 class= "font-serif text-2xl md:text-2xl lg:text-2xl font-bold text-amber-100 leading-tight">
            Sistema de Gestión de Fiambrería
        </h2>

        <p class="mt-4 md:mt-5 text-amber-200/80 text-xs md:text-sm lg:text-base font-sans italic max-w-xl mx-auto lg:mx-0">
            Ingrese sus credenciales para acceder al sistema.
        
        </p> 

    <!-- Session Status -->
    <!-- <div class="p-8 md:p-10 lg:p-12 flex flex-col justify-center bg-white"> -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
<!-- </div> -->
        <!-- Correo Electrónico -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2" />
            <x-text-input 
                id="email" 
                 class="w-full px-4 py-3 bg-amber-50/10 border border-gray-200 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm transition-all duration-150"
                type="email" name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-2" />
            <x-text-input id="password" 
                            class="w-full px-4 py-3 bg-amber-50/10 border border-gray-200 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm transition-all duration-150"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordame -->
        <div class="flex items-center justify-between text-sm pt-1">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class= "rounded border-gray-300 text-amber-600 focus:ring-amber-500 shadow-smw-4 h-4" name="remember">
                <span class="ms-2 text-xs md:text-sm text-gray-600 font-sans">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-xs md:text-sm text-amber-800 hover:text-amber-950 font-medium underline transition-colors duration-150"
                 href="{{ route('password.request') }}">
                    {{ __('¿Olvido su contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Iniciar Sesión') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>