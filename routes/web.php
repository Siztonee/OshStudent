<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Teachers\GradesController;
use App\Http\Controllers\Teachers\SemesterController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\NotAuthMiddleware;
use App\Http\Middleware\StudentsMiddleware;
use App\Http\Middleware\TeachersMiddleware;
use App\Livewire\GradesLivewire;
use Illuminate\Support\Facades\Route;


Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::patch('/settings/theme', [SettingsController::class, 'setTheme'])->name('settings.theme');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
});

Route::middleware([AuthMiddleware::class, StudentsMiddleware::class])->group(function () {
    Route::get('/health-check', [HealthCheckController::class, 'index'])->name('health_check');
});

Route::middleware([AuthMiddleware::class, TeachersMiddleware::class])->group(function () {
    Route::get('/teacher-semester', [SemesterController::class, 'index'])->name('teachs.semester');
    Route::get('/teacher-grade', GradesLivewire::class)->name('teachs.grade');
    Route::post('/update-grade', GradesController::class)->name('teachs.update.grade');
});

Route::middleware(NotAuthMiddleware::class)->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('auth');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth.auth');
});

