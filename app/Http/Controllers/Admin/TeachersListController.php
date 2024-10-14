<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersListController extends Controller
{
    public function index(User $user)
    {
        return view('admin.teachers-list', [
            'teachers' => $user->where('role', 'teacher')->paginate(40)
        ]);
    }
}
