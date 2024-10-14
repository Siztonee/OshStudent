@extends('layouts.app')

@section('title') Информация о преподавателе @endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4 body">
        <div class="bg-white shadow-2xl rounded-lg overflow-hidden max-w-4xl w-full">
            <div class="bg-gray-100 p-4 border-b-2 border-gray-300">
                <h1 class="text-2xl font-bold text-center text-gray-800">Информация о преподавателе</h1>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3 mb-4 md:mb-0">
                        <img src="https://placehold.co/3x4" alt="Фото преподавателя" class="w-full h-auto object-cover rounded-lg shadow-md">
                    </div>
                    <div class="md:w-2/3 md:pl-6">
                        <h2 class="text-xl font-semibold mb-2">
                            {{ $teacher->last_name .' '. $teacher->first_name .' '. $teacher->middle_name }}
                        </h2>
                        <p class="text-gray-600 mb-2"><strong>Должность:</strong> Старший преподаватель</p>
                        <p class="text-gray-600 mb-2"><strong>Дата поступления на работу:</strong> {{ $teacher->created_at }}</p>
                        <p class="text-gray-600 mb-2"><strong>Номер телефона:</strong> +996 (xxx) xxx-xxx</p>
                        <p class="text-gray-600 mb-2"><strong>Рейтинг:</strong> {{ $teacher->score }}</p>
                        <p class="text-gray-600 mb-2"><strong>Куратор группы:</strong> {{ $teacher->group }}</p>
                        <p class="text-gray-600 mb-2"><strong>Адрес:</strong> г. Ош, ул. Момунова, д. 10, кв. 5</p>
                        <p class="text-gray-600 mb-2"><strong>Дата рождения:</strong> 15.05.1980</p>
                        <p class="text-gray-600 mb-2"><strong>Специальность:</strong> {{ $teacher->specialization }}</p>
                        <p class="text-gray-600 mb-2"><strong>Медосмотр:</strong> 
                            {{ $teacher->is_health_check_complete ? 'Пройден' : 'Не пройден' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 p-4 border-t-2 border-gray-300 text-center text-sm text-gray-600">
                Данный документ был написан в образовательных целях и только.
            </div>
        </div>
    </div>
@endsection