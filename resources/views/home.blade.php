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
                    <p class="mb-2">Группа: {{ auth()->user()->group->name }}</p>
                    <p>Курс: {{ auth()->user()->year_of_study }}</p>
                </div>
            </div>
            <div class="p-8 md:w-1/2 flex items-center">
                <div class="w-full">
                    <div class="flex justify-between"> <!-- Изменено на justify-between -->
                        <div class="text-center">
                            <div class="relative inline-block w-64 h-64">
                                @php
                                    $averageGrade = 5;
                                    $gradePercentage = ($averageGrade / 5) * 100;
                                @endphp
                                <svg class="w-full h-full" viewBox="0 0 36 36">
                                    <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#eee"
                                          stroke-width="3"/>
                                    <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#4CAF50"
                                          stroke-width="3"
                                          stroke-dasharray="{{ $gradePercentage }}, 100"/>
                                    <text x="18" y="20.35" class="text-sm font-bold" text-anchor="middle" fill="#4CAF50">{{ number_format($averageGrade, 1) }}</text>
                                </svg>
                            </div>
                            <p class="mt-4 text-lg font-medium">Средний балл</p>
                        </div>
                        <div class="text-center">
                            <div class="relative inline-block w-64 h-64">
                                @php
                                    $attendance = 35;
                                @endphp
                                <svg class="w-full h-full" viewBox="0 0 36 36">
                                    <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#eee"
                                          stroke-width="3"/>
                                    <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                                          fill="none"
                                          stroke="#2196F3"
                                          stroke-width="3"
                                          stroke-dasharray="{{ $attendance }}, 100"/>
                                    <text x="18" y="20.35" class="text-sm font-bold" text-anchor="middle" fill="#2196F3">{{ $attendance }}%</text>
                                </svg>
                            </div>
                            <p class="mt-4 text-lg font-medium">Посещаемость</p>
                        </div>
                    </div>
                </div>
            </div>
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
