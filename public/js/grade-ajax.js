let currentSelectedGradeCell = null;

document.addEventListener('DOMContentLoaded', function() {
    const gradeCells = document.querySelectorAll('.grade-cell');
    gradeCells.forEach(cell => {
        cell.addEventListener('click', onGradeCellClick);
    });

    document.addEventListener('click', onDocumentClick);
});

function onGradeCellClick(event) {
    const cell = event.currentTarget;
    if (currentSelectedGradeCell) {
        currentSelectedGradeCell.classList.remove('bg-red-100');
    }
    cell.classList.add('bg-red-100');
    currentSelectedGradeCell = cell;

    createGradeInput(cell);
}

function onDocumentClick(event) {
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
    input.classList.add('relative', 'w-16', 'h-8', 'text-center', 'border', 'rounded', 'focus:outline-none', 'focus:ring-2', 'focus:ring-red-500', 'z-50', 'dark:bg-gray-800', 'dark:text-gray-100');
    input.value = cell.textContent.trim();
    input.dataset.studentId = cell.dataset.studentId;
    input.dataset.subjectId = cell.dataset.subjectId;
    input.dataset.teacherId = cell.dataset.teacherId;
    input.dataset.day = cell.dataset.day;
    input.addEventListener('change', onGradeInputChange);
    input.addEventListener('blur', onGradeInputBlur);
    container.innerHTML = '';
    container.appendChild(input);
    input.focus();
}

function removeGradeInput() {
    const container = document.getElementById('grade-input-container');
    container.innerHTML = '';
}

function onGradeInputChange(event) {
    const input = event.target;
    const studentId = input.dataset.studentId;
    const subjectId = input.dataset.subjectId;
    const teacherId = input.dataset.teacherId;
    const day = input.dataset.day;
    const grade = input.value;

    updateGrade(studentId, subjectId, teacherId, day, grade);
}

function onGradeInputBlur(event) {
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
