<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsListController extends Controller
{
    public function index(User $user)
    {
        return view('admin.students-list', [
            'students' => $user->where('role', 'student')->paginate(40)
        ]);
    }
}
