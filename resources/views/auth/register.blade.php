<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CyberProtocol') }} - Fiambrería</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col justify-center items-center bg-stone-100 px-4 py-8 font-sans text-gray-900 antialiased">
    <div class="w-full max-w-md sm:max-w-lg bg-white rounded-2xl border border-amber-100 shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-amber-800 to-amber-950 px-6 py-5 text-center">
            <h2 class="font-serif text-xl font-bold text-amber-50 tracking-wide">
                CyberProtocol Fiambrería
            </h2>
            <p class="text-amber-200/50 text-xs mt-1">
                {{ __('Registrar nuevo usuario administrador') }}
            </p>
        </div>
        <div class="px-7 py-6">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                
                <a href="{{ url('/') }}"
                    class="mr-4 text-sm text-amber-700 hover:text-amber-900 font-semibold">
                    ← Volver al inicio
                </a>

                <div>
                    <x-input-label for="name" :value="__('Nombre Completo')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                    <x-text-input id="name" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ej. Alejandro Quiroga" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                    <x-text-input id="email" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                        type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="usuario@cyberprotocol.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                    <x-text-input id="password" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                        type="password" name="password" required autocomplete="new-password" placeholder="Crea una contraseña segura" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                    <x-text-input id="password_confirmation" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                        type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repite la contraseña" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <x-primary-button class="w-full justify-center">
                    {{ __('Registrarse') }}
                </x-primary-button>

                <div class="pt-3 border-t border-amber-200/40 text-center text-xs">
                    <a class="text-amber-700 hover:text-amber-900 font-medium underline underline-offset-2 transition-colors" href="{{ route('login') }}">
                        {{ __('¿Ya tenés una cuenta? Iniciá sesión') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>