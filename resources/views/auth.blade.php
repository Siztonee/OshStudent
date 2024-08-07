<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Авторизация - {{ env('app_name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-3xl font-bold text-center text-red-600 mb-6">Вход</h2>

            <form action="{{ route('auth.auth') }}" method="post">
                @csrf

                @if ($errors->any())
                    <div class="mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul class="mt-2 list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Логин:</label>
                    <input type="text" id="login" name="login" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Пароль:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" required>
                    <button id="togglePassword" type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                        <input type="checkbox" name="show_hide">
                    </button>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-600">Запомнить меня</label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-red-600 text-white font-bold py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Войти
                </button>

            </form>

        </div>
    </body>

    <script src="{{ asset('js/hide-show.js') }}"></script>


</html>
