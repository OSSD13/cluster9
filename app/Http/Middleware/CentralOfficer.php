<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CentralOfficer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_role === 'C') {
            return $next($request);
        }

        return redirect('/login')->withErrors(['message' => 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้']);
    }
}
