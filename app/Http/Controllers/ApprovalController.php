<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    // แสดงหน้า report ของส่วนกลาง
    public function report_central()
    {
        return view('central.report');
    }
}
