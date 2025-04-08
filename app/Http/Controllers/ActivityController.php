<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history()
    {
        $activity = Activity::all();
        return $activity;
    }

    public function getHistoryData()
    {
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
    function getVolunteerActivity()
    {
        return $activities = Activity::all();
    }

    //แสดงหน้า history ของส่วนกลาง
    public function history_central()
    {
        //return view('province/historyProvince'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php

        return view('central.history');
    }
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

    

    public function detailProvince()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('province/history-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function viewSheet()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/historyCentral'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }
    public function historySheet()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/historySheet'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function detailCentral()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/history-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

}
