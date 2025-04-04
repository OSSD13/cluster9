<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Category; // เพิ่มการเรียกใช้ Model Category

class ActivityController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลกิจกรรมทั้งหมดจากฐานข้อมูล
        $activities = Activity::all();
        $categories = Category::all(); // ดึงข้อมูลหมวดหมู่ทั้งหมด

        // ส่งข้อมูลไปยัง view
        return view('homepofficer', compact('activities', 'categories')); // ส่งทั้ง activities และ categories
    }
}
