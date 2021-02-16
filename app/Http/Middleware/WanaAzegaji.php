<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WanaAzegaji
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
//
        if (Auth::user()->role_id == 3) {
            return redirect()->route('reporter');

        }
////    role 2 = admin
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin');

        }
        if (Auth::user()->role_id == 5) {
            return redirect()->route('finance');

        }
        if (Auth::user()->role_id == 4) {
            return redirect()->route('hidet');

        }
        if (Auth::user()->role_id == 2) {
            return $next($request);
        }

    }
}
