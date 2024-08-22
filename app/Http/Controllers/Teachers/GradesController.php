<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradesRequest;
use App\Models\Grade;
use function now;
use function response;

class GradesController extends Controller
{

    public function __invoke(GradesRequest $request)
    {
        $validated = $request->validated();

        $grade = Grade::updateOrCreate(
            [
                'student_id' => $validated['student_id'],
                'subject_id' => $validated['subject_id'],
                'teacher_id' => $validated['teacher_id'],
                'day' => $validated['day'],
                'month' => now()->month,
                'year' => now()->year,
            ],
            ['grade' => $validated['grade']]
        );

        return response()->json(['success' => true]);
    }
}
