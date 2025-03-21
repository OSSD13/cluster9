<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (Auth::check() && Auth::user()->user_role == $role) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้');
    }
}
