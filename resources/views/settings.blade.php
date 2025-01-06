@extends('layouts.app')

@section('title') Настройки @endsection


@section('content')
    <div class="mb-8">
        <h1 class="dark:text-white text-red-800 text-3xl font-bold mb-6">Настройки</h1>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="shadow-lg rounded-lg overflow-hidden dark:bg-gray-800 bg-white">
            <div class="md:flex">
                <div class="md:w-1/4 p-4 dark:bg-gray-800 bg-white">
                    <nav>
                        <ul class="space-y-2">
                            <li><a href="#account" class="block p-2 rounded dark:text-gray-300 text-gray-700">Аккаунт</a></li>
                            <li><a href="#appearance" class="block p-2 rounded dark:text-gray-300 text-gray-700">Внешний вид</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="md:w-3/4 p-6">
                    <section id="account" class="mb-12">
                        <h2 class="text-2xl dark:text-white text-gray-700 font-semibold mb-4">Аккаунт</h2>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <div class="mb-4">
                                <span for="confirmPassword" class="block text-smm font-medium mb-1 dark:text-gray-300 text-gray-700">Выйти из аккаунта</span>
                            </div>
                            <button type="submit" class="dark:bg-gray-700 bg-red-600 text-white font-bold py-2 px-4 rounded-md">
                                Выйти
                            </button>
                        </form>
                    </section>

                    <section id="appearance">
                        <h2 class="text-2xl dark:text-white text-gray-700 font-semibold mb-4">Внешний вид</h2>
                            <div class="mb-4 dark:text-gray-300 text-gray-700">
                                <div class="mb-4">
                                    <span class="block text-smm font-medium mb-1 dark:text-gray-300 text-gray-700">Тема оформления</label>
                                </div>
                                <button id="toggle-theme" class="dark:bg-gray-700 bg-red-600 text-white font-bold py-2 px-4 rounded-md">
                                    Сменить
                                </button>
                            </div>                                
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection
