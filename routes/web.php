<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login'])->name('login'); // เพิ่ม ->name('login')

Route::get('/home', function () {
    return view('home');
});

Route::get('/user-data', [UserController::class, 'getUserData']);
