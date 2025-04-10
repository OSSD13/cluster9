<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//ใช้รวม Controller ต่างๆที่จำเป็นต้องใช้ Path เดียวกัน
class VolunteerController extends Controller
{
    //รวม controller ของหน้าหลักที่ดึงข้อมูล Category, Activity
    function index(){
        $categories = (new CategoryController)->getVolunteerCategory(); //หมวดหมู่
        $activity = DB::table('var_activities')->get();

         $activities = DB::table('var_activities')->join('var_categories', 'categories_id', '=', 'var_categories.category_id') //join กับ หมวดหมู่
         ->where('var_activities.users_id',auth()->id())->get();

        //$activities = Activity::where('users_id',auth()->id())->get();

        return view('volunteer.main' ,compact('categories' ,'activities'));
    }
}
