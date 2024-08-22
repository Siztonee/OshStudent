// grade-ajax.js
window.GradeManager = (function() {
    let currentSelectedGradeCell = null;

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
                    const cell = document.querySelector(`.grade-cell[data-student-id="${studentId}"][data-day="${day}"]`);
                    if (cell) {
                        cell.textContent = grade;
                    }
                } else {
                    console.error('Ошибка при обновлении оценки');
                }
            });
    }

    return {
        init: function() {
            const gradeCells = document.querySelectorAll('.grade-cell');
            gradeCells.forEach(cell => {
                cell.addEventListener('click', handleGradeCellClick);
            });

            document.addEventListener('click', handleDocumentClick);
        }
    };
})();
