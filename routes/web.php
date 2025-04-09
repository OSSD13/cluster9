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
use App\Http\Controllers\DashboardController;


Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'));

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// กลุ่ม Route สำหรับ อาสาสมัคร
Route::middleware([Volunteer::class, 'auth'])->group(function () {
    Route::get('/volunteer', [RoleController::class, 'v'])->name('volunteer.home');
    Route::get('/homevolunteer', [RoleController::class, 'v']);
    Route::get('/categories/volunteer', [CategoryController::class, 'index_volunteer'])->name('vcategories');
    Route::get('/home/volunteer', [VolunteerController::class, 'index'])->name('home_volunteer');

    Route::get('/history', function () {
        $categories = \App\Models\Category::all();
        $activities = \App\Models\Activity::all();
        return view('volunteer.main', compact('categories'),compact('activities'));
    })->name('history');
});

// กลุ่ม Route สำหรับ เจ้าหน้าที่ระดับจังหวัด
Route::middleware([ProvinceOfficer::class, 'auth'])->group(function () {
    Route::get('/pofficer', [RoleController::class, 'p'])->name('pofficer.home');
    Route::get('/homeprovince', [RoleController::class, 'p']);
    Route::get('/categories/province', [CategoryController::class, 'index_province'])->name('pcategories');
    Route::get('/provincedashboard', [DashboardController::class, 'index_province'])->name('pdashboard');
});

// check สิทธิ์การเข้าถึง ส่วนกลาง
Route::middleware([CentralOfficer::class,'auth'])->group(function () {
    Route::get('/cofficer', [RoleController::class, 'c'])->name('cofficer.home');
    Route::get('/homecentral', [RoleController::class, 'c']);
    Route::get('/categories/central', [CategoryController::class, 'index_central'])->name('ccategories');
    Route::get('/report/central', [CategoryController::class, 'report_central'])->name('creport');
    Route::get('/checkactivity/central', [CategoryController::class, 'check_central'])->name('ccheck');
    Route::get('/categories/historyCentral', [ActivityController::class, 'viewSheet'])->name('viewSheet');
    Route::get('/categories/historySheet', [ActivityController::class, 'historySheet'])->name('historySheet');
    Route::get('/categories/vhd001-c', [ActivityController::class, 'detailCentral'])->name('detailCentral');
    Route::get('/centraldashboard', [DashboardController::class, 'index_central'])->name('cdashboard');

    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// ต้องมีการ Login เท่านั้น
Route::middleware(['auth'])->group(function () {
    Route::get('/user-data', [UserController::class, 'getUserData']);

    Route::get('/categories/history', [ActivityController::class, 'history'])->name('history.all');
    Route::get('/categories/history/{id}', [ActivityController::class, 'show'])->name('categories.history');
});

