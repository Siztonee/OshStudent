@extends('layouts.app')

@section('title') Создать группу @endsection

@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <form method="post" action="{{ route('action.groups.create') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Название группы</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Создать группу
                    </button>
                    <a href="#" class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection