<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - {{ env('app_name') }}</title>
        @stack('links')

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="flex flex-col min-h-screen {{ auth()->user()->theme === 'dark' ? 'bg-gray-700 text-white' : 'bg-gray-100' }}">

        @include('layouts.app-header')

        <main class="container mx-auto py-8 flex-grow">
            @yield('content')
        </main>

        @include('layouts.app-footer')


    </body>
</html>

