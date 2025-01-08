<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateGroupController extends Controller
{
    public function index()
    {
        $teachers = User::whereNull('group_id')->where('role', 'teacher')->get();
        $students = User::whereNull('group_id')->where('role', 'student')->get();

        return view('admin.create-group', compact('teachers', 'students'));
    }

    public function create(Request $request, Group $group)
    {
        $group->firstOrCreate($request->all());
        return redirect()->route('admins.groups');
    }
}
