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

    //แก้ไขข้อมูลกิจกรรม
    public function edit(Request $request, $id)
    {
    $request->validate([
        'activity_name' => 'required|string|max:255',
        'activity_description' => 'required|string',
        'activity_date' => 'required|date',
    ]);

    $activity = Activity::findOrFail($id);

    $activity->activity_name = $request->activity_name;
    $activity->activity_description = $request->activity_description;
    $activity->activity_date = $request->activity_date;
    $activity->save();

    return redirect()->back()->with('success', 'กิจกรรมได้รับการแก้ไขเรียบร้อยแล้ว');
    }

    //ลบข้อมูลกิจกรรม
    public function destroy($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
}
