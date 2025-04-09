<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\Volunteer;
use App\Http\Middleware\ProvinceOfficer;
use App\Http\Middleware\CentralOfficer;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ApprovalController; // เพิ่ม Controller ที่อาจมีในไฟล์ที่สอง

Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'));

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// check สิทธิ์การเข้าถึง อาสาสมัคร
Route::middleware([Volunteer::class, 'auth'])->group(function () {
    Route::get('/volunteer', [RoleController::class, 'v'])->name('volunteer.home');
    Route::get('/homevolunteer', [RoleController::class, 'v']);
    Route::get('/categories/volunteer', [CategoryController::class, 'index_volunteer'])->name('vcategories');
    Route::get('/home/volunteer', [VolunteerController::class, 'index'])->name('home_volunteer');
    Route::get('/history', [ActivityController::class, 'history_volunteer'])->name('history');

    // Route ที่ซ้ำซ้อน (สามารถลบได้)
    // Route::get('/history', function () {
    //     $categories = \App\Models\Category::all();
    //     return view('volunteer.main', compact('categories'));
    // })->name('history');

    // Route ที่ใช้อยู่ (จากไฟล์แรก)
    Route::post('/activities/{cat_id}', [ActivityController::class, 'addActivity'])->name('activities.addActivity');

    // แชทเพิ่ม (จากไฟล์แรก)
    Route::get('/activities', [ActivityController::class, 'index']);
    // Route::post('/activities', [ActivityController::class, 'store']);
});

// check สิทธิ์การเข้าถึง จังหวัด
Route::middleware([ProvinceOfficer::class, 'auth'])->group(function () {
    Route::get('/pofficer', [RoleController::class, 'p'])->name('pofficer.home');
    Route::get('/homeprovince', [RoleController::class, 'p']);
    Route::get('/categories/province', [CategoryController::class, 'index_province'])->name('pcategories');
});

// Route ที่อาจมีในไฟล์ที่สอง (ดูเหมือนจะอยู่นอก middleware)
Route::get('/report/central', [CategoryController::class, 'index_report'])->name('creport');

// check สิทธิ์การเข้าถึง ส่วนกลาง
Route::middleware([CentralOfficer::class, 'auth'])->group(function () {
    Route::get('/cofficer', [RoleController::class, 'c'])->name('cofficer.home');
    Route::get('/homecentral', [RoleController::class, 'c']);
    Route::get('/categories/central', [CategoryController::class, 'index_central'])->name('ccategories');
    // ใช้ ApprovalController จากไฟล์ที่สอง
    Route::get('/report/central', [ApprovalController::class, 'report_central'])->name('creport');
    Route::get('/checkactivity/central', [CategoryController::class, 'check_central'])->name('ccheck');
    Route::get('/dashboard/central', [CategoryController::class, 'dashboard_central'])->name('cdashboard');
    Route::get('/categories/historyCentral', [ActivityController::class, 'viewSheet'])->name('viewSheet');
    Route::get('/categories/historySheet', [ActivityController::class, 'historySheet'])->name('historySheet');
    Route::get('/categories/vhd001-c', [ActivityController::class, 'detailCentral'])->name('detailCentral');

    // Route ที่ซ้ำซ้อน (สามารถลบได้)
    // Route::get('/categories/central', [CategoryController::class, 'index_central'])->name('ccategories');
});

// check สิทธิ์การ login
Route::middleware(['auth'])->group(function () {
    Route::get('/user-data', [UserController::class, 'getUserData']);

    // CRUD for categories
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::delete('/activity/{id}', [ActivityController::class, 'destroy'])->name('activity.delete'); // จากไฟล์ที่สอง
});
