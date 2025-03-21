<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login'])->name('login'); // เพิ่ม ->name('login')

Route::get('/home', function () {
    return view('home');
});

Route::get('/user-data', [UserController::class, 'getUserData']);

Route::get('/volunteer', [RoleController::class, 'v'])->middleware('auth');
Route::get('/pofficer', [RoleController::class, 'p'])->middleware('auth');
Route::get('/cofficer', [RoleController::class, 'c'])->middleware('auth');


?>
