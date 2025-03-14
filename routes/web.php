<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
     //search
     Route::get('/search', [SearchController::class, 'search'])->name('search');
    // mapel Routes
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');

    // Student Routes
    Route::get('/student', [StudentController::class, 'index'])->name('student');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'delete'])->name('student.delete');

         // Tecaher Routes
    Route::get('/techer', [TeacherController::class, 'index'])->name('techer');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');

    // mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
    Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/mapel/{id}', [MapelController::class, 'delete'])->name('mapel.delete');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
