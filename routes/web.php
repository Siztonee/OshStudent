<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingsController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\NotAuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::patch('/settings/theme', [SettingsController::class, 'setTheme'])->name('settings.theme');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/health-check', [HealthCheckController::class, 'index'])->name('health_check');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
});

Route::middleware(NotAuthMiddleware::class)->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('auth');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth.auth');
});

