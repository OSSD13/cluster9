<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActivityController;

use Illuminate\Http\Request;

//ใช้รวม Controller ต่างๆที่จำเป็นต้องใช้ Path เดียวกัน
class VolunteerController extends Controller
{
    //รวม controller ของหน้าหลักที่ดึงข้อมูล Category, Activity  
    function index(){
        $categories = (new CategoryController)->getVolunteerCategory(); //หมวดหมู่
        $activities = (new ActivityController)->getVolunteerActivity(); //กิจกรรม
        return view('volunteer.main' ,compact('categories' ,'activities'));
    }
}