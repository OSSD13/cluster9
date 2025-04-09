<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index_province()
    {
        // ดึงข้อมูลจำนวนอาสาสมัคร
        $volunteerCounts = Dashboard::selectRaw('YEAR(activity_date) as year, COUNT(DISTINCT users_id) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('count', 'year')
            ->toArray();

        $labels = array_keys($volunteerCounts);
        $data = array_values($volunteerCounts);

        // Use a unified dashboard view for both province and central users
        return view('province.dashboard', compact('labels', 'data'));
    }


    public function index_central()
    {
        // ดึงข้อมูลจำนวนอาสาสมัคร
        $volunteerCounts = Dashboard::selectRaw('YEAR(activity_date) as year, COUNT(DISTINCT users_id) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('count', 'year')
            ->toArray();

        $labels = array_keys($volunteerCounts);
        $data = array_values($volunteerCounts);

        // Use a unified dashboard view for both province and central users
        return view('central.dashboard', compact('labels', 'data'));
    }
}
