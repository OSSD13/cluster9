<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceOfficer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'P') {
            return $next($request);
        }

        return redirect('/login')->withErrors(['message' => 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้']);
    }
}
