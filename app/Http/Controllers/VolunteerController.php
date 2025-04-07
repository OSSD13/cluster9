<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActivityController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//ใช้รวม Controller ต่างๆที่จำเป็นต้องใช้ Path เดียวกัน
class VolunteerController extends Controller
{
    //รวม controller ของหน้าหลักที่ดึงข้อมูล Category, Activity  
    function index(){
        $categories = (new CategoryController)->getVolunteerCategory(); //หมวดหมู่

        $activities = DB::table('var_activities') //กิจกรรม 
        ->join('var_categories', 'categories_id', '=', 'var_categories.category_id') //join กับ หมวดหมู่
        ->get();
        
        return view('volunteer.main' ,compact('categories' ,'activities'));
    }
}