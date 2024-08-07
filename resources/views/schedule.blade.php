@extends('layouts.app')

@section('title') Расписание @endsection

@section('content')
    <div class="container mx-auto py-8 px-4 {{ auth()->user()->theme === 'dark' ? 'text-white' : 'text-red-600' }}">
        <h1 class="text-3xl font-bold mb-6">Расписание занятий</h1>

        <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: {{ auth()->user()->theme === 'dark' ? '#282c3d' : '#ebebeb' }}">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Группа: {{ auth()->user()->group->name }}</h2>

                @php
                    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
                @endphp

                @foreach($days as $index => $day)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-3 {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-red-500' }}">{{ $day }}</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                <tr class="text-red-600 dark:text-red-400" style="background-color: {{ auth()->user()->theme === 'dark' ? '#252a3d' : '#fee2e2' }}">
                                    <th class="px-4 py-2 text-left">Время</th>
                                    <th class="px-4 py-2 text-left">Предмет</th>
                                    <th class="px-4 py-2 text-left">Преподаватель</th>
                                    <th class="px-4 py-2 text-left">Аудитория</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules->where('day_of_week', $index + 1) as $schedule)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-2">
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                        </td>
                                        <td class="px-4 py-2">{{ $schedule->subject }}</td>
                                        <td class="px-4 py-2">{{ $schedule->teacher }}</td>
                                        <td class="px-4 py-2">{{ $schedule->room }}</td>
                                    </tr>
                                @endforeach
                                @if($schedules->where('day_of_week', $index + 1)->isEmpty())
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">Нет занятий</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
