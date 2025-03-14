<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/user-data', [UserController::class, 'getUserData']);
