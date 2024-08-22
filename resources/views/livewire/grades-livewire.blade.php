

@section('title') Оценка @endsection


<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap items-center justify-between mb-8">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold text-red-700 mr-4">Журнал оценок</h1>
            <div id="grade-input-container"></div>
        </div>
        <div class="flex space-x-4">
            <select id="yearSelect" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @for ($year = date('Y') - 3; $year <= date('Y'); $year++)
                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
            <select id="monthSelect" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                @foreach ($months as $index => $month)
                    <option value="{{ $index + 1 }}" {{ $index + 1 == date('n') ? 'selected' : '' }}>{{ $month }}</option>
                @endforeach
            </select>
            <select id="groupSelect" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
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
                @for ($day = 1; $day <= 31; $day++)
                    <th class="py-3 px-2 text-center">{{ $day }}</th>
                @endfor
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4 font-medium">{{ $student->last_name.' '.$student->first_name }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="py-1 px-1 text-center">
                            <div class="relative">
                                <div class="w-6 h-6 border rounded flex items-center justify-center cursor-pointer hover:bg-gray-100 grade-cell"
                                     data-student-id="{{ $student->id }}"
                                     data-subject-id="{{ $subjectId }}"
                                     data-teacher-id="{{ auth()->id() }}"
                                     data-day="{{ $day }}">
                                    {{ $grades[$student->id][$day]->grade ?? '' }}
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
    <script>
        let currentSelectedGradeCell = null;

        document.addEventListener('DOMContentLoaded', function() {
            const gradeCells = document.querySelectorAll('.grade-cell');
            gradeCells.forEach(cell => {
                cell.addEventListener('click', handleGradeCellClick);
            });

            document.addEventListener('click', handleDocumentClick);
        });

        function handleGradeCellClick(event) {
            const cell = event.currentTarget;
            if (currentSelectedGradeCell) {
                currentSelectedGradeCell.classList.remove('bg-red-100');
            }
            cell.classList.add('bg-red-100');
            currentSelectedGradeCell = cell;

            createGradeInput(cell);
        }

        function handleDocumentClick(event) {
            if (currentSelectedGradeCell && !currentSelectedGradeCell.contains(event.target)) {
                currentSelectedGradeCell.classList.remove('bg-red-100');
                currentSelectedGradeCell = null;
                removeGradeInput();
            }
        }

        function createGradeInput(cell) {
            const container = document.getElementById('grade-input-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.classList.add('relative', 'w-16', 'h-8', 'text-center', 'border', 'rounded', 'focus:outline-none', 'focus:ring-2', 'focus:ring-red-500', 'z-50');
            input.value = cell.textContent.trim();
            input.dataset.studentId = cell.dataset.studentId;
            input.dataset.subjectId = cell.dataset.subjectId;
            input.dataset.teacherId = cell.dataset.teacherId;
            input.dataset.day = cell.dataset.day;
            input.addEventListener('change', handleGradeInputChange);
            input.addEventListener('blur', handleGradeInputBlur);
            container.innerHTML = '';
            container.appendChild(input);
            input.focus();
        }

        function removeGradeInput() {
            const container = document.getElementById('grade-input-container');
            container.innerHTML = '';
        }

        function handleGradeInputChange(event) {
            const input = event.target;
            const studentId = input.dataset.studentId;
            const subjectId = input.dataset.subjectId;
            const teacherId = input.dataset.teacherId;
            const day = input.dataset.day;
            const grade = input.value;

            updateGrade(studentId, subjectId, teacherId, day, grade);
        }

        function handleGradeInputBlur(event) {
            removeGradeInput();
        }

        function updateGrade(studentId, subjectId, teacherId, day, grade) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/update-grade', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    student_id: studentId,
                    subject_id: subjectId,
                    teacher_id: teacherId,
                    day: day,
                    grade: grade
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Обновляем значение в ячейке таблицы
                        const cell = document.querySelector(`.grade-cell[data-student-id="${studentId}"][data-day="${day}"]`);
                        if (cell) {
                            cell.textContent = grade;
                        }
                    } else {
                        console.error('Ошибка при обновлении оценки');
                    }
                });
        }
    </script>
@endpush
