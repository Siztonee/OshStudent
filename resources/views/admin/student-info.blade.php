@extends('layouts.app')

@section('title') Информация о преподавателе @endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 body">
        <div class="dark:bg-gray-800 bg-white shadow-2xl rounded-lg overflow-hidden max-w-4xl w-full">
            <div class="dark:bg-gray-600 bg-gray-100 p-4 border-b-2 dark:border-gray-500 border-gray-300">
                <h1 class="text-2xl font-bold text-center dark:text-gray-100 text-gray-800">Информация о преподавателе</h1>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/3 mb-4 md:mb-0">
                        <img src="{{ asset($student->profile) }}" alt="Фото преподавателя" class="w-full h-auto object-cover rounded-lg shadow-md">
                    </div>
                    <div class="md:w-2/3 md:pl-6">
                        <h2 class="text-xl font-semibold mb-2">
                            {{ $student->last_name .' '. $student->first_name .' '. $student->middle_name }}
                        </h2>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Дата поступления на учебу:</strong> {{ $student->created_at ?? $student->updated_at }}</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Номер телефона:</strong> +996 (xxx) xxx-xxx</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Рейтинг:</strong> {{ $student->score }}</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Куратор группы:</strong> {{ $student->group->name }}</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Адрес:</strong> г. Ош, ул. Момунова, д. 10, кв. 5</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Дата рождения:</strong> 15.05.1980</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Специальность:</strong> {{ $student->specialization }}</p>
                        <p class="dark:text-gray-200 text-gray-600 mb-2"><strong>Медосмотр:</strong> 
                            {{ $student->is_health_check_complete ? 'Пройден' : 'Не пройден' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="dark:bg-gray-600 bg-gray-100 p-4 border-t-2 dark:border-gray-500 border-gray-300 text-center text-sm font-bold dark:text-gray-100 text-gray-600">
                Уникальный идентификатор ID: {{ $student->id }}
            </div>
        </div>
    </div>
@endsection