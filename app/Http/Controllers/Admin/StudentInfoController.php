<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentInfoController extends Controller
{
    public function index(User $student)
    {
        if ($student->role !== 'student') {
            return abort(403, 'Не найдено');
        }

        return view('admin.student-info', compact('student'));
    }
}
