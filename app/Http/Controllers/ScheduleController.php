<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public $schedules;

    public function index()
    {
        if (Auth::user()->role == 'student') {
            $schedules = Schedule::where('group_id', auth()->user()->group->id)->get();
        } elseif (Auth::user()->role == 'teacher') {
            $schedules = Schedule::where('teacher_id', auth()->user()->id)->get();
        } elseif (Auth::user()->role == 'admin') {
            $schedules = Schedule::all();
        }

        return view('schedule', compact('schedules'));
    }

}
