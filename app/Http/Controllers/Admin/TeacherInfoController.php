<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherInfoController extends Controller
{
    public function index(User $teacher)
    {
        if ($teacher->role !== 'teacher') {
            return abort(403, 'Не найдено');
        }
        
        return view('admin.teacher-info', compact('teacher'));
    }
}
