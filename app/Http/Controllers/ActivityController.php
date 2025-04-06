<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history() {
        $activity = Activity::all();
        return $activity;
    }
    
    public function getHistoryData() {
        //แสดงข้อมูลย้อนหลัง
       return $activity;
    }

    public function history_volunteer()
    {
        $categories = Category::all();
        return view('volunteer.history', compact('categories'));
    }
    
}
