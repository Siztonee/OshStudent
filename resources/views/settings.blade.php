@extends('layouts.app')

@section('title') Настройки @endsection


@section('content')
    <div class="mb-8">
        <h1 class="{{ auth()->user()->theme === 'dark' ? 'text-white' : 'text-red-800' }} text-3xl font-bold mb-6">Настройки</h1>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: {{ auth()->user()->theme === 'dark' ? '#252a3d' : '#fff' }}">
            <div class="md:flex">
                <div class="md:w-1/4 p-4" style="background-color: {{ auth()->user()->theme === 'dark' ? '#282c3d' : '#fff' }}">
                    <nav>
                        <ul class="space-y-2">
                            <li><a href="#account" class="block p-2 rounded hover:bg-red-100">Аккаунт</a></li>
                            <li><a href="#appearance" class="block p-2 rounded hover:bg-red-100">Внешний вид</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="md:w-3/4 p-6">
                    <section id="account" class="mb-12">
                        <h2 class="text-2xl font-semibold mb-4">Аккаунт</h2>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <div class="mb-4">
                                <span for="confirmPassword" class="block text-smm font-medium mb-1 {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-gray-700' }}">Выйти из аккаунта</span>
                            </div>
                            <button type="submit" class="{{ auth()->user()->theme === 'dark' ? 'bg-gray-700' : 'bg-red-600 hover:bg-red-700' }} text-white font-bold py-2 px-4 rounded-md">
                                Выйти
                            </button>
                        </form>
                    </section>

                    <section id="appearance">
                        <h2 class="text-2xl font-semibold mb-4">Внешний вид</h2>
                        <form method="post" action="{{ route('settings.theme') }}">
                            @csrf
                            @method('patch')
                            <div class="mb-4 {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-gray-700' }}">
                                <label for="theme" class="block text-sm font-medium mb-1">Тема оформления</label>
                                <select id="theme"
                                        name="theme"
                                        class="w-full px-3 py-2 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500"
                                        style="border: none; {{ auth()->user()->theme === 'dark' ? 'background-color: #282c3d;' : '' }}">
                                    <option value="light" {{ auth()->user()->theme == 'light' ? 'selected' : '' }}>Светлая</option>
                                    <option value="dark" {{ auth()->user()->theme == 'dark' ? 'selected' : '' }}>Темная</option>
                                </select>
                            </div>
                            <button type="submit" class="{{ auth()->user()->theme === 'dark' ? 'bg-gray-700' : 'bg-red-600 hover:bg-red-700' }} text-white font-bold py-2 px-4 rounded-md">
                                Применить
                            </button>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection
