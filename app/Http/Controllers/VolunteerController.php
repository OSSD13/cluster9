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

       
        $user = Auth::user(); // ดึงข้อมูลผู้ใช้งานที่ล็อกอินอยู่
        $activities = Activity::all(); // กรองกิจกรรมที่ผู้ใช้งานสร้าง
        
        return view('volunteer.main' ,compact('categories' ,'activities'));
    }
}