@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <div class="flex items-center justify-center mt-4">
        <div class="dark:bg-gray-800 bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-3xl font-bold text-center dark:text-gray-100 text-red-600 mb-6">Вход</h2>

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
                    <label for="email" class="block dark:text-gray-100 text-gray-700 text-sm font-bold mb-2">Логин:</label>
                    <input type="text" id="login" name="login" class="w-full px-3 py-2 border dark:border-gray-600 border-gray-300 rounded-md text-gray-600" required>
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="block dark:text-gray-100 text-gray-700 text-sm font-bold mb-2">Пароль:</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 pr-10 border dark:border-gray-600 border-gray-300 rounded-md text-gray-600" required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 text-gray-600 focus:outline-none hsPassword">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <label for="remember" class="text-sm dark:text-gray-100 text-gray-600">Запомнить меня</label>
                    </div>
                </div>

                <button type="submit" class="w-full dark:bg-gray-700 bg-red-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Войти
                </button>

            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/hide-show.js') }}"></script>
@endpush