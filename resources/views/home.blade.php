@extends('layouts.app')

@section('title') Главная @endsection

@section('content')
    <div class="shadow-lg rounded-lg overflow-hidden max-w-5xl mx-auto dark:bg-gray-800 bg-white mb-8">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Profile section -->
            <div class="p-4 md:p-8 w-full md:w-1/2 dark:bg-gray-800 bg-gay-50">
                <img
                    src="{{ asset(auth()->user()->profile) }}"
                    alt="Фото студента" 
                    class="w-32 h-32 md:w-48 md:h-48 rounded-full mx-auto mb-4 md:mb-8"
                >
                <h1 class="text-xl md:text-2xl font-bold text-center dark:text-gray-100 text-red-800 mb-4">
                    {{ auth()->user()->getFullName() }}
                </h1>
                <div class="text-base md:text-lg text-center dark:text-gray-200 text-red-600">
                    @can('has-role', ['student'])
                        <p class="mb-2">Группа: {{ auth()->user()->group->name }}</p>
                        <p>Курс: {{ auth()->user()->group->course }}</p>
                    @elsecan('has-role', ['teacher'])
                        <p>Куратор группы: {{ auth()->user()->group->name ?? 'Отсутствует' }}</p>
                    @endcan
                </div>
            </div>

            @can('has-role', ['student'])
                @include('layouts.score')

            @elsecan('has-role', ['teacher'])
                <livewire:components.next-lesson>

            @elsecan('has-role', ['admin'])
                @include('admin.admin-panel') 
                     
            @endcan

        </div>
    </div>

    <h1 class="text-3xl font-bold mt-12 text-center">Новости</h1>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <div class="rounded-lg shadow-md overflow-hidden dark:bg-gray-800 bg-white">
                <img src="{{ $article['urlToImage'] }}" alt="Изображение новости" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">
                        <a href="{{ $article['url'] }}" class="text-blue-600 hover:text-blue-800">{{ $article['title'] }}</a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-2">
                        {{ date('d.m.Y H:i', strtotime($article['publishedAt'])) }}
                    </p>

                    <div class="dark:text-gray-300 text-red-900">
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
