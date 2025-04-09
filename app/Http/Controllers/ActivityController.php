<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth;
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
    //เพิ่มกิจกรรม
    public function addActivity(Request $req, $cat_id){

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
//chatเพิ่มมา
    public function index()
    {
        return response()->json(Activity::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'activity_name' => 'required|string',
            'activity_description' => 'required|string',
            'activity_images.*' => 'image|mimes:jpg,jpeg,png'
        ]);

        $imagePaths = [];
        if ($request->hasFile('activity_images')) {
            foreach ($request->file('activity_images') as $image) {
                $imagePaths[] = $image->store('activity_images', 'public');
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

}
