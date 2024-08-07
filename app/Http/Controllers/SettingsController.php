<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function setTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:light,dark',
        ]);

        $user = auth()->user();
        $user->theme = $request->theme;
        $user->save();


        return redirect()->route('settings')->with('success', 'Тема успешно обновлена');
    }

}
