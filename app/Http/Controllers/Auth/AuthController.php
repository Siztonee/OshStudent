<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function auth(AuthRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            // Если аутентификация успешна, перенаправляем на домашнюю страницу
            return redirect()->intended(route('home', absolute: false));
        }

        // Если аутентификация не удалась, возвращаемся на страницу входа с ошибкой
        return back()->withErrors([
            'error' => 'Неправильный логин или пароль.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth');
    }
}
