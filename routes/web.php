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
<<<<<<< Updated upstream
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



=======
    session()->forget('user_name');
    return redirect('/login');
})->name('logout');

// check สิทธิ์การเข้าถึง อาสาสมัคร
Route::middleware([Volunteer::class,'auth'])->group(function () {
    Route::get('/volunteer', [RoleController::class, 'v'])->name('volunteer.home');
    Route::get('/homevolunteer', [RoleController::class, 'v']);
    Route::get('/categories/volunteer', [CategoryController::class, 'index_volunteer'])->name('vcategories');
    Route::get('/history', function () {
        $categories = \App\Models\Category::all();
        return view('volunteer.main', compact('categories'));
    })->name('history');
});

// check สิทธิ์การเข้าถึง จังหวัด
Route::middleware([ProvinceOfficer::class,'auth'])->group(function () {
    Route::get('/pofficer', [RoleController::class, 'p'])->name('pofficer.home');
    Route::get('/homeprovince', [RoleController::class, 'p']);
    Route::get('/categories/province', [CategoryController::class, 'index_province'])->name('pcategories');
});


// check สิทธิ์การเข้าถึง ส่วนกลาง
Route::middleware([CentralOfficer::class,'auth'])->group(function () {
    Route::get('/cofficer', [RoleController::class, 'c'])->name('cofficer.home');
    Route::get('/homecentral', [RoleController::class, 'c']);
    Route::get('/categories/central', [CategoryController::class, 'index_central'])->name('ccategories');
});

// check สิทธิ์การ login
Route::middleware(['auth'])->group(function () {
    Route::get('/user-data', [UserController::class, 'getUserData']);
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
>>>>>>> Stashed changes
