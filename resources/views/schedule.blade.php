@extends('layouts.app')

@section('title') Расписание @endsection

@section('content')
    <div class="container mx-auto py-8 px-4 {{ auth()->user()->theme === 'dark' ? 'text-white' : 'text-red-600' }}">
        <h1 class="text-3xl font-bold mb-6">Расписание занятий</h1>

        <div class="shadow-lg rounded-lg overflow-hidden" style="background-color: {{ auth()->user()->theme === 'dark' ? '#282c3d' : '#ebebeb' }}">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Группа: {{ auth()->user()->group->name ?? 'Отсутствует' }}</h2>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="text-red-600 dark:text-red-400" style="background-color: {{ auth()->user()->theme === 'dark' ? '#252a3d' : '#fee2e2' }}">
                            <th class="px-4 py-2 text-left">День</th>
                            <th class="px-4 py-2 text-left">Время</th>
                            <th class="px-4 py-2 text-left">Предмет</th>
                            <th class="px-4 py-2 text-left">Преподаватель</th>
                            <th class="px-4 py-2 text-left">Аудитория</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
                        @endphp

                        @foreach($days as $index => $day)
                            @php $daySchedules = $schedules->where('day_of_week', $index + 1); @endphp
                            @if($daySchedules->isNotEmpty())
                                @foreach($daySchedules as $schedule)
                                    <tr class="border-b">
                                        @if($loop->first)
                                            <td class="px-4 py-2 font-semibold {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-red-500' }}" rowspan="{{ $daySchedules->count() }}">
                                                {{ $day }}
                                            </td>
                                        @endif
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                        </td>
                                        <td class="px-4 py-2">{{ $schedule->subject->name }}</td>
                                        <td class="px-4 py-2">{{ $schedule->teacher['last_name'] . ' ' . $schedule->teacher['first_name'] }}</td>
                                        <td class="px-4 py-2">{{ $schedule->room }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="border-t-2 border-red-500 dark:border-red-700">
                                    <td class="px-4 py-2 font-semibold {{ auth()->user()->theme === 'dark' ? 'text-gray-300' : 'text-red-500' }}">{{ $day }}</td>
                                    <td colspan="4" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">Нет занятий</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
