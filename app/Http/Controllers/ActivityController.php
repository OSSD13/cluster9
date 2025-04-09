<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function history_province()
    {
        return view('province.history');
    }

    public function getHistoryData()
    {
        $activity = Activity::all();
        return $activity;
    }

    public function history_volunteer()
    {
        $categories = Category::all();
        return view('volunteer.history', compact('categories'));
    }

    public function getVolunteerActivity()
    {
        //return $activities = Activity::all();
        //ไนท์เพิ่มใหม่9/4/68
       // ใช้ auth()->id() เพื่อดึง ID ของผู้ใช้ที่ล็อกอิน
    $userId = auth()->id();

    // กรองกิจกรรมตาม users_id ที่ทำการบันทึก
    $activities = Activity::where('users_id', $userId)->get();

    // ส่งกลับข้อมูลกิจกรรมที่กรองแล้ว
    return response()->json($activities);
    }

    public function history_central()
    {
        return view('central.history');
    }

    //ใช้อยู่ตอนนี้
    //เพิ่มกิจกรรม
    public function addActivity(Request $req, $cat_id)
    {
        $req->validate([
            'activity_name' => 'required|string|max:255',
            'activity_description' => 'required|string',
            'activity_date' => 'required|date',
            'category_id' => 'required|exists:var_categories,category_id',
        ]);

        $activity = new Activity();
        $activity->activity_name = $req->input('activity_name');
        $activity->activity_description = $req->input('activity_description');
        $activity->activity_date = $req->input('activity_date');
        $activity->categories_id = $cat_id;
        $activity->activity_report_date = now()->toDateTimeString();
        $activity->activity_create_at = now()->toDateTimeString();
        $activity->activity_update_at = now()->toDateTimeString();
        $activity->activity_year = now()->year;
        $activity->users_id = auth()->id();
        $activity->activity_status = 'รอตรวจสอบ'; // หรือสถานะเริ่มต้น

        //$data = $req->all();
        //$data['users_id'] = Auth::id();
        //Activity::create($data);
        //$activity->save();
        $activity->save();

        return redirect()->back()->with('success', 'เพิ่มกิจกรรมเรียบร้อยแล้ว!');
    }
    public function index()
    {
        //ไนท์เพิ่มใหม่9/4/68
        $user = Auth::user(); // ดึงข้อมูลผู้ใช้งานที่ล็อกอินอยู่
        $activities = Activity::where('users_id', $user->id)->get(); // กรองกิจกรรมที่ผู้ใช้งานสร้าง
        //dd($activities);
        //echo"check";
        return view('activities.index', compact('activities'));
    }

    public function checkDetailProvince()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('province/check-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }
    public function viewSheet()
    {
        return view('central.historyCentral');
    }

    public function historySheet()
    {
        return view('central.historySheet');
    }

    public function historyDetailCentral()
    {
        return view('central.history-detail');
    }

    /*public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back()->with('success', 'กิจกรรมถูกลบเรียบร้อยแล้ว');
    }*/
    public function checkDetailCentral()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('central/check-detail'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
    }

    public function checkByProvince()
    {
        return view('province/checkActivityProvince');
    }

    public function checkByCentral()
    {
        return view('central/checkActivityCentral');
    }

    public function checkSheet()
    {
        return view('central/checkSheetCentral');
    }

    public function historyDetailProvince()
    {
        // Replace 'region' with an existing column, e.g., 'province'

        return view('province/check-detail');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id', // เพิ่ม exists เช็ค category_id
            'activity_name' => 'required|string',
            'activity_description' => 'required|string',
            'activity_images.*' => 'image|mimes:jpg,jpeg,png|max:2048', // เพิ่ม max size
        ]);

        $imagePaths = [];
        if ($request->hasFile('activity_images')) {
            foreach ($request->file('activity_images') as $image) {
                $imagePaths[] = $image->store('public/activity_images'); // เปลี่ยน path เป็น public/activity_images
            }
        }

        $activity = Activity::create([
            'category_id' => $request->category_id,
            'activity_name' => $request->activity_name,
            'activity_description' => $request->activity_description,
            'activity_images' => json_encode($imagePaths),
        ]);

        return response()->json($activity, 201);
    }

    public function detailProvince()
    {
        return view('province.history-detail');
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
    $activity = Activity::findOrFail($id);

    // ตรวจสอบว่าเป็นของผู้ใช้คนนี้จริงหรือเปล่า (ถ้าต้องการ)
    if ($activity->users_id !== auth()->id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    $activity->delete();
    $activity = Activity::all();

    return redirect()->back()->with('success','activity has been deleted successfully');
    
}
}






