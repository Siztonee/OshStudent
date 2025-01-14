@extends('layouts.app')
@section('title') Оценки за семестр @endsection
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold dark:text-gray-100 text-red-700">Оценки за семестр</h1>
        </div>
    </div>
    
    <div class="overflow-x-auto rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
                <tr class="dark:bg-gray-800 bg-red-600">
                    <th class="px-6 py-4 text-left text-white font-medium whitespace-nowrap">Предмет</th>
                    <th class="px-6 py-4 text-center text-white font-medium whitespace-nowrap">1 сессия</th>
                    <th class="px-6 py-4 text-center text-white font-medium whitespace-nowrap">2 сессия</th>
                    <th class="px-6 py-4 text-center text-white font-medium whitespace-nowrap">Экзамен</th>
                    <th class="px-6 py-4 text-center text-white font-medium whitespace-nowrap">Сумма</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-600 bg-white">
                @foreach ($subjects as $subject)
                    <tr class="border-b transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $subject->name }}</td>
                        
                        @for ($i = 1; $i <= 3; $i++)
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <div class="w-8 h-8 border rounded flex items-center justify-center transition-colors duration-200">
                                        {{ $grades[$subject->id][$i]->grade ?? 0 }}
                                    </div>
                                </div>
                            </td>
                        @endfor

                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <div class="w-8 h-8 border rounded flex items-center justify-center transition-colors duration-200">
                                    {{ $totals[$subject->id] ?? 0 }}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection