<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function history()
    {
        // ดึงข้อมูลกิจกรรมย้อนหลังจากฐานข้อมูล ถ้ามี
        // $activities = Activity::where(...)->get(); // สมมุติ

        return view('province/historyProvince'); // ชื่อ blade ที่คุณเขียนไว้ เช่น history.blade.php
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

}
