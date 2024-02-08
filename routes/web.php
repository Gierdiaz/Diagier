<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

//TODO: verificar depois
Route::get('/forgot-password', 'App\Http\Controllers\ForgotPasswordController@showLinkRequestForm')->name('password.request');


// Rotas de Autenticação
Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'RegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'LoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Profiles Routes
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/projects', [DeveloperController::class, 'index'])->name('projects.index');
    Route::get('/projects/tasks', [DeveloperController::class, 'task'])->name('projects.tasks');


    // Developers Routes
    Route::get('/developers/{profileId}', [DeveloperController::class, 'index'])->name('developer.profile');
    Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
    Route::get('/developers/{developer}', [DeveloperController::class, 'show'])->name('developers.show');
    Route::get('/developers/create', [DeveloperController::class, 'create'])->name('developers.create');
    Route::post('/developers', [DeveloperController::class, 'store'])->name('developers.store');
    Route::get('/developers/{developer}/edit', [DeveloperController::class, 'edit'])->name('developers.edit');
    Route::put('/developers/{developer}', [DeveloperController::class, 'update'])->name('developers.update');
    Route::delete('/developers/{developer}', [DeveloperController::class, 'destroy'])->name('developers.destroy');

    // Projects Routes
    Route::get('/developers/{developer}/projects', [ProjectController::class, 'projects'])->name('developers.projects');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Tasks Routes
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Feedbacks Routes
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');
    Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::get('/feedbacks/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
    Route::put('/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});
