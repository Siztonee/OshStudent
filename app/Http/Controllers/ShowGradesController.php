<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SemesterGrade;

class ShowGradesController extends Controller
{
    public function __invoke()
    {
        $subjects = Subject::all();
        $grades = SemesterGrade::where('student_id', auth()->id())
            ->where('year', date('Y'))
            ->get()
            ->groupBy('subject_id')
            ->map->keyBy('session');

        $totals = $grades->map(function ($sessions) {
            return $sessions->sum('grade');
        });

        return view('show-grades', compact('subjects', 'grades', 'totals'));
    }
}
