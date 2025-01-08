@extends('layouts.app')

@section('title') Медосмотр @endsection

@section('content')
    <div class="flex flex-col min-h-screen text-gray-800 shadow-lg px-4 overflow-hidden dark:bg-gray-800 bg-white">
        <div class="container mx-auto py-8 flex-grow px-4 text-gray-800 dark:text-gray-200">
            <h1 class="text-3xl font-bold mb-6 text-red-600 dark:text-gray-200">Медицинский осмотр</h1>

            <div class="flex flex-col md:flex-row gap-6">
                <!-- Левая колонка с фото и ФИО -->
                <div class="md:w-1/4">
                    <div class="shadow-lg rounded-lg overflow-hidden dark:bg-gray-700 bg-gray-200">
                        <div class="p-6">
                            <img src="{{ asset('storage/profiles/' . basename(auth()->user()->profile)) }}" alt="Фото студента" class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h2 class="text-xl font-semibold text-center dark:text-gray-100 text-red-900">
                                {{ auth()->user()->last_name . ' ' . auth()->user()->first_name . ' ' . auth()->user()->middle_name }}
                            </h2>
                            <p class="text-center text-gray-600 dark:text-gray-200 mt-3">{{ auth()->user()->group->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка с информацией о медосмотре -->
                <div class="md:w-3/4">
                    <div class="shadow-lg rounded-lg overflow-hidden dark:bg-gray-700 bg-gray-200">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4 text-red-600 dark:text-white">Статус медосмотра</h2>
                            <p class="text-lg mb-4">
                                Статус:
                                @if(auth()->user()->is_health_check_complete)
                                    <span class="font-bold text-green-600">Пройден</span>
                                @else
                                    <span class="font-bold text-red-600">Не пройден</span>
                                @endif
                            </p>
                            <p class="mb-4">Дата последнего осмотра: <span class="font-semibold">15.03.2024</span></p>
                            <p class="mb-4">Действителен до: <span class="font-semibold">15.03.2025</span></p>
                        </div>
                    </div>

                    <!-- Дополнительная информация о медосмотре -->
                    <div class="mt-6 shadow-lg rounded-lg overflow-hidden dark:bg-gray-700 bg-gray-200">
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4 text-red-600 dark:text-white">Предстоящий медосмотр</h2>
                            <p class="mb-4">Дата следующего медосмотра: <span class="font-semibold">15.03.2025</span></p>
                            <p class="mb-4">Место проведения: <span class="font-semibold">Студенческая поликлиника, каб. 205</span></p>
                            <p class="mb-4">Необходимые документы:</p>
                            <ul class="list-disc list-inside mb-4 pl-4">
                                <li>Паспорт</li>
                                <li>Студенческий билет</li>
                                <li>Медицинский полис</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
