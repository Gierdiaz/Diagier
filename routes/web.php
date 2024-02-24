<?php

use App\Http\Controllers\{
    AuthController,
    DeveloperController,
    FeedbackController,
    ProjectController,
    TaskController
};
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('main.main');
})->name('main');

Route::get('/maintenance', function () {
    return view('wait.wait');
})->name('wait');

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'RegistrationForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('login', [AuthController::class, 'LoginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    //TODO: verificar depois
    Route::get('forgot-password', [AuthController::class, 'ForgotPasswordForm'])->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::get('reset-password/{token}', [AuthController::class, 'ResetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth:sanctum', '2fa'])->group(function () {

    Route::get('/settings', 'App\Http\Controllers\UserController@index')->name('settings');
    Route::put('/settings', 'App\Http\Controllers\UserController@update')->name('settings.update');

    Route::post('/2fa/enable', [AuthController::class, 'register'])->name('2fa.enable');
    Route::get('/2fa', [AuthController::class, 'google2fa'])->name('2fa');

    // Developers Routes
    Route::get('developers', [DeveloperController::class, 'index'])->name('developers.index');
    Route::get('developers/create', [DeveloperController::class, 'create'])->name('developers.create');
    Route::get('developers/{developer}', [DeveloperController::class, 'show'])->name('developers.show');
    Route::post('developers', [DeveloperController::class, 'store'])->name('developers.store');
    Route::get('developers/{developer}/edit', [DeveloperController::class, 'edit'])->name('developers.edit');
    Route::put('developers/{developer}', [DeveloperController::class, 'update'])->name('developers.update');
    Route::delete('developers/{developer}', [DeveloperController::class, 'destroy'])->name('developers.destroy');

    // Projects Routes
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('rojects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Tasks Routes
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Feedbacks Routes
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::get('/feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/feedbacks/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
    Route::put('/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});
