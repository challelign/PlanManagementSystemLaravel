<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Reporter
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
//        role 3 = user -- reporter
        if (Auth::user()->role_id == 3) {
            return $next($request);
        }
//    role 1 = admin
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin');
        }

        if (Auth::user()->role_id == 2) {
            return redirect()->route('wanaazegaj');
        }

        //        role 5 = finance
        if (Auth::user()->role_id == 5) {
            return redirect()->route('finance');

        }  if (Auth::user()->role_id == 4) {
            return redirect()->route('hidet');

        }

    }
}
