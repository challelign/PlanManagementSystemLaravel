<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
//
//        $user = Auth::user();
//        if (!Auth::check()) {
//            return redirect()->route('login');
//        }
//
//        if ($user->isAdmin()) {
//            return redirect()->intended('/');
//        }
//        return $next($request);

        if (!Auth::check()) {
            return redirect()->route('welcome');
        }
//        role 3 = user
 /*       if (Auth::check() && Auth::user()->role_id == 3) {
            return redirect()->route('reporter');

        }*/
////        role 5 = finance
        if (Auth::check() && Auth::user()->role_id == 5) {
            return redirect()->route('finance');

        }
//    role 1 = admin
        if (Auth::user()->role_id == 1) {
            return $next($request);
        }
//        return redirect()->route(404);

//        role 2 = hidet
        if (Auth::user()->role_id == 4) {
            return redirect()->route('hidet');
        }
        if (Auth::user()->role_id == 3) {
            return redirect()->route('reporter');
        }
        if (Auth::user()->role_id == 2) {
            return redirect()->route('wanaazegaj');
        }
        if (Auth::user()->role_id == 8) {
            return redirect()->route('smanager');
        }
//        if($request->session()->get('role_id') == ''){
//            return redirect('/');
//        }
    }
}
