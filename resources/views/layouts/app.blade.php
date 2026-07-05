<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CyberProtocol') }} - Fiambrería</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    
    {{-- Fuentes --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-stone-100" x-data="{ sidebarOpen: false }">

    @include('layouts.topbar')

    {{-- Overlay para mobile cuando el sidebar está abierto --}}
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/50 md:hidden transition-opacity"></div>

    <div class="flex pt-16">

        @include('layouts.sidebar')

        <div class="flex-1 min-w-0 md:pl-56">

            @isset($header)
            <header class="bg-white shadow-sm border-b">
                <div class="px-4 sm:px-8 py-6">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <main class="p-4 sm:p-8">
                {{ $slot }}
            </main>

        </div>

    </div>
    
    @livewireScriptConfig
</body>

</html>