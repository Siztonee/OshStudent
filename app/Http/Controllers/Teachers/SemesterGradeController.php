<?php

namespace App\Http\Controllers\Teachers;

use function now;
use function response;
use App\Models\SemesterGrade;
use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterGradeRequest;

class SemesterGradeController extends Controller
{
    public function __invoke(SemesterGradeRequest $request)
    {        
        $validated = $request->validated();

        $grade = SemesterGrade::updateOrCreate(
            [
                'student_id' => $validated['student_id'],
                'subject_id' => $validated['subject_id'],
                'teacher_id' => $validated['teacher_id'],
                'semester' => $validated['semester'],
                'year' => now()->year,
            ],
            ['grade' => $validated['grade']]
        );

        return response()->json(['success' => true]);
    }
}
