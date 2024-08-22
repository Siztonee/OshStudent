@extends('layouts.app')

@section('title') Главная @endsection

@section('content')
    <div class="shadow-lg rounded-lg overflow-hidden max-w-3xl ml-0" style="background-color: {{ auth()->user()->theme === 'dark' ? '#252a3d' : '#fff' }}">
        <div class="flex flex-col md:flex-row">
            <div class="p-8 md:w-1/2" style="background-color: {{ auth()->user()->theme === 'dark' ? '#282c3d' : '#ebebeb' }}">
                <img
                    src="{{ asset('storage/profiles/' . basename(auth()->user()->profile)) }}"
                    alt="Фото студента" class="w-48 h-48 rounded-full mx-auto mb-8">
                <h1 class="text-2xl font-bold text-center text-red-800 mb-4">
                    {{ auth()->user()->last_name . ' ' . auth()->user()->first_name . ' ' . auth()->user()->middle_name }}
                </h1>
                <div class="text-lg text-center {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-red-600' }}">
                    @if(auth()->user()->role == 'student')
                        <p class="mb-2">Группа: {{ auth()->user()->group->name }}</p>
                        <p>Курс: {{ auth()->user()->year_of_study }}</p>
                    @elseif(auth()->user()->role == 'teacher')
                        <p>Куратор группы: {{ auth()->user()->group->name ?? 'Отсутствует' }}</p>
                    @endif
                </div>
            </div>

            @if(auth()->user()->role == 'student')
                @include('layouts.score')
            @elseif(auth()->user()->role == 'teacher')
                @include('layouts.next-lesson')
            @endif
        </div>
    </div>

    <h1 class="text-3xl font-bold mt-12 text-center">Новости</h1>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <div class="rounded-lg shadow-md overflow-hidden" style="background-color: {{ auth()->user()->theme === 'dark' ? '#252a3d' : '#fff' }}">
                <img src="{{ $article['urlToImage'] }}" alt="Изображение новости" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">
                        <a href="{{ $article['url'] }}" class="text-blue-600 hover:text-blue-800">{{ $article['title'] }}</a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-2">
                        {{ date('d.m.Y H:i', strtotime($article['publishedAt'])) }}
                    </p>

                    <div class="{{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-red-900' }}">
                        @if($article['description'])
                            <p>{{ $article['description'] }}</p>
                        @elseif($article['content'])
                            <p>{{ Str::limit($article['content'], 197) }}</p>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
