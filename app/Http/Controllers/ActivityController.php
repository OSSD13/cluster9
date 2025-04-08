<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history()
    {
        //$activity = Activity::all();
        //return $activity;
        return view('province/historyProvince'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php

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


    public function addActivity(Request $req){

        $activity = new Activity();
        $activity->activity_name = $req->activity_name;
        $activity->activity_description = $req->activity_description;
        $activity->activity_date = $req->activity_date;
        $activity->categories_id = $req->category_id;
        $activity->user_id = auth()->id();
        $activity->activity_status = 'รอตรวจสอบ'; // หรือสถานะเริ่มต้น


    }
    public function historyDetailProvince()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('province/history-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function checkDetailProvince()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('province/check-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
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

    public function historyDetailCentral()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/history-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function checkDetailCentral()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/check-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function checkByProvince() {
        return view('province/checkActivityProvince');
    }

    public function checkByCentral() {
        return view('central/checkActivityCentral');
    }

    public function checkSheet() {
        return view('central/checkSheetCentral');
    }


}
