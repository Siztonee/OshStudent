@section('title') Отметка посещения @endsection

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap items-center justify-between mb-8">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold dark:text-gray-100 text-red-700 mr-4">Отметка посещения студента</h1>
            <div id="grade-input-container"></div>
            <div wire:loading>
                <span>Загрузка...</span>
            </div>
        </div>
        <div class="flex space-x-4">
            <select wire:model.lazy="selectedYear" class="dark:bg-gray-800 dark:text-gray-200 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @for ($year = date('Y') - 3; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
            <select wire:model.lazy="selectedMonth" class="dark:bg-gray-800 dark:text-gray-200 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @foreach ($months as $index => $month)
                    <option value="{{ $index }}">{{ $month }}</option>
                @endforeach
            </select>
            <select wire:model.lazy="selectedGroup" class="dark:bg-gray-800 dark:text-gray-200 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full dark:bg-gray-600 bg-white shadow-md rounded-lg">
            <thead>
            <tr class="dark:bg-gray-800 bg-red-600 text-white">
                <th class="py-3 px-4 text-left">Студент</th>
                @for ($day = 1; $day <= 31; $day++)
                    <th class="py-3 px-2 text-center">{{ $day }}</th>
                @endfor
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr class="border-b dark:hover:bg-gray-500 hover:bg-gray-100">
                    <td class="py-3 px-4 font-medium">{{ $student->last_name.' '.$student->first_name }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="py-1 px-1 text-center">
                            <div class="relative">
                                <div class="w-6 h-6 border rounded flex items-center justify-center cursor-pointer dark:hover:bg-gray-600 hover:bg-gray-100 grade-cell"
                                     data-student-id="{{ $student->id }}"
                                     data-subject-id="{{ $subjectId }}"
                                     data-teacher-id="{{ auth()->id() }}"
                                     data-day="{{ $day }}">
                                    {{ $marks[$student->id][$day]->mark ?? '' }}
                                </div>
                            </div>
                        </td>
                    @endfor
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@push('scripts')
    <script src="{{ asset('js/mark-ajax.js') }}"></script>
@endpush