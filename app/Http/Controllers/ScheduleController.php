<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('group_id', auth()->user()->group->id)->get();
        return view('schedule', compact('schedules'));
    }
}
