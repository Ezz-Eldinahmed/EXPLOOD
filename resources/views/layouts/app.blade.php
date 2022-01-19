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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="icon" href="/images/logo.png">

    @livewireStyles()
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation')

    <div class="grid grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5">
        <div class="bg-white rounded p-3 shadow-md min-h-screen">
            @if ( !(request()->routeIs('orders.index') || request()->routeIs('payment')
            ) )
            @livewire('search-sidebar')
            @endif
        </div>

        <div class="sm:col-span-1 md:col-span-1 lg:col-span-4 xl:col-span-4">
            <div>
                <h1 class="flex justify-center text-4xl font-semibold my-3">EXPLOOD</h1>
                {{ $slot }}
            </div>
        </div>
    </div>
    @include('layouts.footer')

    @livewireScripts
</body>

</html>
