<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lara') }}</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Style --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow bg-dark z-30 relative">
            @livewire('navigation-dropdown')
        </header>

        {{-- Page Content1 --}}
        <div class="flex">
            <aside class="w-240 bg-white h-100p-main relative z-20 border-r border-gray-200">
                {{ $sidebar }}
            </aside>
            <main class="h-100p-main flex-1">
                {{ $main }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>