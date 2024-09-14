

@section('title') Оценка @endsection


<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap items-center justify-between mb-8">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold text-red-700 mr-4">Журнал оценок</h1>
            <div id="grade-input-container"></div>
            <div wire:loading>
                <span>Загрузка...</span>
            </div>
        </div>
        <div class="flex space-x-4">
            <select wire:model.lazy="selectedYear" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @for ($year = date('Y') - 3; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
            <select wire:model.lazy="selectedSemester" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="1">1</option>
                    <option value="2">2</option>
            </select>
            <select wire:model.lazy="selectedGroup" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
            <tr class="bg-red-600 text-white">
                <th class="py-3 px-4 text-left">Студент</th>
                <th class="py-3 px-6 text-left">Оценка</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4 font-medium">
                        {{ $student->last_name.' '.$student->first_name }}
                    </td>

                    <td class="py-1 px-1 text-center">
                        <div class="relative">
                            <div class="w-6 h-6 border rounded flex items-center justify-center cursor-pointer hover:bg-gray-100 grade-cell"
                                    data-student-id="{{ $student->id }}"
                                    data-subject-id="{{ $subjectId }}"
                                    data-teacher-id="{{ auth()->id() }}"
                                    data-semester="{{ $selectedSemester }}">
                                {{ $grades[$student->id][0]['grade'] ?? '' }}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/semester-ajax.js') }}"></script>
@endpush