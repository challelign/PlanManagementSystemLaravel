<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Finance
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
//        role 1 = user
        if (Auth::user()->role_id == 3) {
            return redirect()->route('reporter');

        }
////    role 2 = admin
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin');
        }
        //hidet
        if (Auth::user()->role_id == 4) {
            return redirect()->route('hidet');
        }

//        role 2 = finance


        if (Auth::user()->role_id == 5) {
            return $next($request);

        }
        if (Auth::user()->role_id == 2) {
            return redirect()->route('wanaazegaj');
        }
//        return $next($request);

    }
}
