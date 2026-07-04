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
                    Verificar Correo Electrónico
                </h2>
                <p class="text-amber-200/50 text-xs mt-1">
                    Confirmá tu dirección de correo
                </p>
            </div>

            
            <div class="px-7 py-6">
                <div class="text-xs text-gray-500 leading-relaxed mb-4">
                    {{ __('Gracias por registrarte. Antes de comenzar, verificá tu dirección de correo electrónico haciendo clic en el enlace que te enviamos. Si no recibiste el correo, te enviaremos otro.') }}
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-xs font-medium text-green-700 bg-green-50 border border-green-200 rounded-lg px-3 py-2.5">
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste.') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="w-full justify-center mb-3">
                        {{ __('Reenviar enlace de verificación') }}
                    </x-primary-button>
                </form>
                <div class="text-center pt-3 border-t border-amber-200/40">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs text-amber-700 hover:text-amber-900 font-medium underline underline-offset-2 transition-colors">
                            {{ __('Cerrar sesión') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
