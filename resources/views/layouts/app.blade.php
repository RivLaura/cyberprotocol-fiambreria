<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-stone-100">

    @include('layouts.topbar')

    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1">

            @isset($header)
            <header class="bg-white shadow-sm border-b">
                <div class="px-8 py-6">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <main class="p-8">
                {{ $slot }}
            </main>

        </div>

    </div>
    
    @livewireScriptConfig
</body>

</html>