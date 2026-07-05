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
        <div class="w-full max-w-sm sm:max-w-md bg-white rounded-2xl border border-amber-100 shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-amber-800 to-amber-950 px-6 py-5 text-center">
                <h2 class="font-serif text-xl font-bold text-amber-50 tracking-wide">
                    Confirmar Contraseña
                </h2>
                <p class="text-amber-200/50 text-xs mt-1">
                    Zona segura del sistema
                </p>
            </div>
            <div class="px-7 py-6">
                <div class="text-xs text-gray-500 leading-relaxed mb-4">
                    {{ __('Esta es un área segura de la aplicación. Por favor, confirmá tu contraseña antes de continuar.') }}
                </div>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <x-input-label for="password" :value="__('Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="password" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="password" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                        <x-primary-button class="w-full justify-center">
                            {{ __('Confirmar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
