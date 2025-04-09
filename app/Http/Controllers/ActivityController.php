<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history()
    {
        return view('province/historyProvince');
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
        $activity->user_id = auth()->id;
        $activity->activity_status = 'รอตรวจสอบ'; // หรือสถานะเริ่มต้น
    }
    public function detailProvince()
    {
        return view('province/history-detail');
    }
    public function viewSheet()
    {
        return view('central/historyCentral');
    }
    public function historySheet()
    {
        return view('central/historySheet');
    }

    public function detailCentral()
    {
        return view('central/history-detail');
    }
}



