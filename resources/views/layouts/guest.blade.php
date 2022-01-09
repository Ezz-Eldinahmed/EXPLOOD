<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="icon" href="/images/logo.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles()
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        @include('layouts.navigation')

        @if ( !(request()->routeIs('login')
        || request()->routeIs('register')
        || request()->routeIs('password.request')
        || request()->routeIs('password.reset')
        || request()->routeIs('verification.notice')
        || request()->routeIs('password.confirm')))
        @livewire('search')

        @endif

        <h1 class="flex justify-center text-4xl font-semibold mt-3 mb-3">EXPLOOD</h1>

        {{ $slot }}

        @include('layouts.footer')

    </div>
    @livewireScripts
</body>

</html>
