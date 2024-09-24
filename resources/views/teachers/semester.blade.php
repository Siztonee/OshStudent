@extends('layouts.app')

@section('title') Cеместр @endsection

@section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-red-700 mb-8 text-center">Панель учителя</h1>

            <div class="space-y-6 max-w-2xl mx-auto">
                <!-- Оценки студентов -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="bg-red-600 text-white py-4 px-6">
                        <a href="{{ route('teachs.grade') }}"><h2 class="text-2xl font-semibold">Оценки студентов</h2></a>
                    </div>
                    <div class="p-6 flex items-center">
                        <p class="text-gray-700">Просмотр и редактирование оценок студентов.</p>
                    </div>
                </div>

                <!-- Отметки посещения -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="bg-red-600 text-white py-4 px-6">
                        <a href="{{ route('teachs.mark') }}"><h2 class="text-2xl font-semibold">Отметки посещения</h2></a>
                    </div>
                    <div class="p-6 flex items-center">
                        <p class="text-gray-700">Учет посещаемости.</p>
                    </div>
                </div>

                <!-- Оценки за семестр -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="bg-red-600 text-white py-4 px-6">
                        <a href="{{ route('teachs.semester.grade') }}"><h2 class="text-2xl font-semibold">Оценки за семестр</h2></a>
                    </div>
                    <div class="p-6 flex items-center">
                        <p class="text-gray-700">Выставление и просмотр итоговых оценок за семестр.</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
