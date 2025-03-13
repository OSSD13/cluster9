<?php

namespace App\Http\Controllers;

use ILLuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $user = User::where ('email' , $request-> email) ->first();
        if (Hash::check($request->password, $user->password)) {
            session()->forget('error');
            session(['user'=>$user]);

            return redirect('/');
        } else {
            session(['error' => 'ข้อมูลการเข้าสู่ระบบไม่ถูกต้อง']);

            return view('login', ['email' => $request->email]);
        }
    }



}
