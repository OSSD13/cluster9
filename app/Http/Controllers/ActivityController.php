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
        return view('central.history');
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

    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required',
            'activity_description' => 'required',
            'activity_date' => 'required|date',
            'activity_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('activity_image') && count($request->file('activity_image')) > 5) {
            return redirect()->back()->with('error', 'ไม่สามารถเลือกรูปภาพเกิน 5 รูปได้');
        }

        // เพิ่มโค้ดบันทึกลงฐานข้อมูลหรือจัดการรูปภาพได้ตรงนี้

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
    }
}

