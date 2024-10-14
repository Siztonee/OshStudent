<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherInfoController extends Controller
{
    public function index($id, User $user)
    {
        return view('admin.teacher-info', [
            'teacher' => $user->find($id)
        ]);
    }
}
