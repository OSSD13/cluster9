<?php

namespace App\Http\Controllers;

use App\Models\UserCluster;

class UserController extends Controller
{
    public function getUserData()
    {
        // ดึงข้อมูลทั้งหมดจาก column var_user
        $users = UserCluster::pluck('user_name');

        // แสดงข้อมูลออกมา
        return $users;
    }
}

