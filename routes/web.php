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

Route::get('/homeprovince', function () {
    return view('layout.layoutprovince');
});

Route::get('/homecentral', function () {
    return view('layout.layoutcentral');
});

Route::get('/homevolunteer', function () {
    return view('layout.layoutvolunteer');
});

Route::post('/login', [UserController::class, 'login'])->name('login'); // เพิ่ม ->name('login')


Route::get('/user-data', [UserController::class, 'getUserData']);

Route::get('/volunteer', [RoleController::class, 'v'])->middleware('auth');
Route::get('/pofficer', [RoleController::class, 'p'])->middleware('auth');
Route::get('/cofficer', [RoleController::class, 'c'])->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/categories', [CategoryController::class, 'indexcentral'])->middleware('auth');

Route::get('/categories/central', [CategoryController::class, 'index_central'])->name('ccategories');
Route::get('/categories/province', [CategoryController::class, 'index_province'])->name('pcategories');

Route::get('/categories/volunteer', function () {
    $categories = \App\Models\Category::all(); // Fetch categories from the database
    return view('volunteer.main', compact('categories'));
})->name('vcategories');

Route::get('/history', function () {
    $categories = \App\Models\Category::all(); // Fetch categories from the database
    return view('volunteer.main', compact('categories'));
})->name('history');


Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/categories/history', [ActivityController::class, 'history'])->name('history');

Route::get('/categories/vhd001', [ActivityController::class, 'detailProvince'])->name('detailPorvince');

Route::get('/categories/history/{id}', [ActivityController::class, 'show'])->name('categories.history');

Route::get('/categories/historyCentral', [ActivityController::class, 'viewSheet'])->name('viewSheet');

Route::get('/categories/historySheet', [ActivityController::class, 'historySheet'])->name('historySheet');

Route::get('/categories/vhd001-c', [ActivityController::class, 'detailCentral'])->name('detailCentral');
