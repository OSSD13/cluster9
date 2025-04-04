<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActivityController;



Route::get('/', function () {
    return view('login');
});

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

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/homepofficer', [ActivityController::class, 'index'])->name('homepofficer');
Route::get('/homepofficer', [ActivityController::class, 'index'])->name('homepofficer');
