<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Volunteer
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_role === 'V') {
            return $next($request);
        }
        
        return redirect('/login')->withErrors(['message' => 'คุณไม่มีสิทธิ์เข้าถึงหน้านี้']);
    }
}
