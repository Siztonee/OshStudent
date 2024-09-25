<?php

use App\Livewire\VisitMark;
use App\Livewire\GradesLivewire;
use App\Livewire\Admin\GroupLivewire;
use App\Livewire\Admin\GroupsLivewire;
use Illuminate\Support\Facades\Route;;
use App\Http\Middleware\AuthMiddleware;
use App\Livewire\SemesterGradeLivewire;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminsMiddleware;
use App\Http\Middleware\NotAuthMiddleware;
use App\Http\Middleware\StudentsMiddleware;
use App\Http\Middleware\TeachersMiddleware;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\Teachers\MarksController;
use App\Http\Controllers\Teachers\GradesController;
use App\Http\Controllers\Admin\CreateGroupController;
use App\Http\Controllers\Teachers\SemesterController;
use App\Http\Controllers\Teachers\SemesterGradeController;

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
    Route::get('/visit-mark', VisitMark::class)->name('teachs.mark');
    Route::post('/update-mark', MarksController::class)->name('teachs.update.mark');
    Route::get('/semester-grade', SemesterGradeLivewire::class)->name('teachs.semester.grade');
    Route::post('/update-semester-grade', SemesterGradeController::class)->name('teachs.update.semester');
});

Route::middleware(NotAuthMiddleware::class)->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('auth');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth.auth');
});

Route::middleware(AdminsMiddleware::class)->group(function () {
    Route::get('/groups', GroupsLivewire::class)->name('admins.groups');
    Route::get('/group/{id}', GroupLivewire::class)->name('admins.group');
    Route::get('/groups/create', [CreateGroupController::class, 'index'])->name('admins.groups.create');
    Route::post('/groups/create', [CreateGroupController::class, 'create'])->name('action.groups.create');
});
