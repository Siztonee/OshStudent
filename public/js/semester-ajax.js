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
    input.dataset.semester = cell.dataset.semester;
    input.dataset.session = cell.dataset.session;
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

    console.log('starting ongradeinputchange function');

    const input = event.target;
    const studentId = input.dataset.studentId;
    const subjectId = input.dataset.subjectId;
    const teacherId = input.dataset.teacherId;
    const semester = input.dataset.semester;
    const session = input.dataset.session;
    const grade = input.value;

    updateGrade(studentId, subjectId, teacherId, semester, session, grade);
}

function onGradeInputBlur(event) {
    removeGradeInput();
}

function updateGrade(studentId, subjectId, teacherId, semester, session, grade) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log('Sending request:', {
        student_id: studentId,
        subject_id: subjectId,
        teacher_id: teacherId,
        semester: semester,
        session: session,
        grade: grade
    });

    fetch('/update-semester-grade', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            student_id: studentId,
            subject_id: subjectId,
            teacher_id: teacherId,
            semester: semester,
            session: session,
            grade: grade
        })
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        return response.text();
    })
    .then(text => {
        console.log('Raw response:', text);
        return JSON.parse(text);
    })
    .then(data => {
        console.log('Parsed data:', data);
        if (data.success) {
            const cell = document.querySelector(`.grade-cell[data-student-id="${studentId}"][data-semester="${semester}"][data-session="${session}"]`);
            if (cell) {
                cell.textContent = grade;
            }
        } else {
            console.error('Ошибка при обновлении оценки');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}
