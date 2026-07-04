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
                    Restablecer Contraseña
                </h2>
                <p class="text-amber-200/50 text-xs mt-1">
                    Creá una nueva contraseña para tu cuenta
                </p>
            </div>
            <div class="px-7 py-6">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="space-y-4">
                        <div>
                            <x-input-label for="email" :value="__('Correo Electrónico')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="email" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="tu@correo.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Nueva Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="password" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="password" name="password" required autocomplete="new-password" placeholder="Ingrese la nueva contraseña" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="block text-xs font-serif uppercase tracking-wider text-amber-950 font-bold mb-1" />
                            <x-text-input id="password_confirmation" class="block w-full px-4 py-2.5 bg-white border border-amber-200/60 focus:border-amber-500 focus:ring-amber-500/50 rounded-xl text-sm text-gray-900 shadow-sm"
                                type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repetí la nueva contraseña" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                        <x-primary-button class="w-full justify-center">
                            {{ __('Restablecer contraseña') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
