<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        switch (Auth::user()->role) {
            case 'student':
                $schedules = Schedule::where('group_id', $user->group->id)->get();
                break;
            case 'teacher':
                $schedules = Schedule::where('teacher_id', $user->id)->get();
                break;
            case 'admin':
                $schedules = Schedule::all();
                break;
            default:
                abort(403, 'Unauthorized'); 
        }

        return view('schedule', compact('schedules'));
    }
}
