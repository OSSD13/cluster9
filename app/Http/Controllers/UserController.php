<?php

namespace App\Http\Controllers;

use App\Models\UserCluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = UserCluster::where('user_name', $request->username)->first();

        if (!$user) {
            return redirect('/login')->withErrors(['message' => 'ไม่พบชื่อผู้ใช้']);
        }

        if (($request->user_password) != $user->user_password) {
            return redirect('/login')->withErrors(['message' => 'รหัสผ่านไม่ถูกต้อง']);
        }

        // Login สำเร็จ
        Auth::login($user);

        switch ($user->user_role) {
            case 'V':
                return redirect('/volunteer');
            case 'P':
                return redirect()->intended('/pofficer');
            case 'C':
                return redirect()->intended('/cofficer');
            default:
                return redirect()->intended('/home');
        }
    }

    public function getUserData()
    {
        // ดึงข้อมูลทั้งหมดจาก column var_user
        $users = UserCluster::all();

        // แสดงข้อมูลออกมา
        return $users;
    }
}
