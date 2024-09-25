<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateGroupController extends Controller
{
    public function index()
    {
        return view('admin.create-group');
    }

    public function create(Request $request, Group $group)
    {
        $group->firstOrCreate([
            'name' => $request['name']
        ]);
        return redirect()->route('admins.groups');
    }
}
