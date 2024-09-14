<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use function now;
use function response;
use App\Http\Requests\MarksRequest;

class MarksController extends Controller
{
    public function __invoke(MarksRequest $request)
    {
        $validated = $request->validated();

        $mark = Mark::updateOrCreate(
            [
                'student_id' => $validated['student_id'],
                'subject_id' => $validated['subject_id'],
                'teacher_id' => $validated['teacher_id'],
                'day' => $validated['day'],
                'month' => now()->month,
                'year' => now()->year,
            ],
            ['mark' => $validated['mark']]
        );

        return response()->json(['success' => true]);
    }
}
