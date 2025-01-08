@extends('layouts.app')

@section('title') Создать группу @endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="dark:bg-gray-800 bg-gray-200 p-8 rounded-lg shadow-md w-full max-w-md">
            <form method="post" action="{{ route('action.groups.create') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block dark:text-gray-100 text-gray-700 text-sm mb-2">Название группы</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 dark:bg-gray-700 dark:text-gray-100 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="curator" class="block dark:text-gray-100 text-gray-700 text-sm mb-2">Куратор группы</label>
                    <select id="curator" name="curator" class="shadow border rounded w-full py-2 px-3 dark:bg-gray-700 dark:text-gray-100 text-gray-700 focus:outline-none focus:shadow-outline">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->getFullName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="headman" class="block dark:text-gray-100 text-gray-700 text-sm mb-2">Староста группы</label>
                    <select id="headman" name="headman" class="shadow border rounded w-full py-2 px-3 dark:bg-gray-700 dark:text-gray-100 text-gray-700 focus:outline-none focus:shadow-outline">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->getFullName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="course" class="block dark:text-gray-100 text-gray-700 text-sm mb-2">Год учебы (курс)</label>
                    <input type="number" value="1" id="course" name="course" class="shadow appearance-none border rounded w-full py-2 px-3 dark:bg-gray-700 dark:text-gray-100 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Создать группу
                    </button>
                    <a href="{{ route('admins.groups') }}" class="inline-block align-baseline font-bold text-sm dark:text-gray-100 dark:hover:text-gray-300 text-gray-600 hover:text-gray-700">
                        Назад
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection