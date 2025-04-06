<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
        if (!Auth::check()) {
            return redirect('/login');
        }

        // ตรวจสอบ role ของผู้ใช้
        $user = Auth::user();
        if ($user->user_role !== $role) {
            return redirect('/login')->withErrors(['message' => 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้']);
        }

        return $next($request);
    }
}
