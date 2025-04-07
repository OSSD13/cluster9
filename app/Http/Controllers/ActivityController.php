<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history() {
        $activity = Activity::all();
        return $activity;
    }

    public function getHistoryData() {
        $activity = Activity::all();
        //แสดงข้อมูลย้อนหลัง
       return $activity;
    }

    public function history_volunteer()
    {
        $categories = Category::all();
        return view('volunteer.history', compact('categories'));
    }
    //ดึงและส่งค่า Activity ของจิตอาสา
    //ใช้ใน VolunteerController
    function getVolunteerActivity(){
        return $activities = Activity::all();
    }
}
