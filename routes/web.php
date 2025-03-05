<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController; 

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Student', function () {
//     return view('Student');
// });

Route::get('/student', [StudentController::class, 'index']); 
Route::get('/user', [UserController::class, 'index']);
