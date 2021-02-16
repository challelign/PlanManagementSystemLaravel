<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware('finance:reporter:admin')->except('logout');
//        $this->middleware('guest:reporter')->except('logout');
//        $this->middleware('guest:finance')->except('logout');
//        $this->middleware('hidet')->except('logout');
    }


    public function redirectTo()
    {

        if (Auth::check() && Auth::user()->role_id == 1) {
            $this->redirectTo = '/admin';
            return $this->redirectTo;
        } elseif (Auth::check() && Auth::user()->role_id == 5) {

            $this->redirectTo = '/finance/home';
            return $this->redirectTo;
        } elseif (Auth::check() && Auth::user()->role_id == 3) {
            $this->redirectTo = '/reporter';
            return $this->redirectTo;
        } elseif (Auth::check() && Auth::user()->role_id == 4) {
            $this->redirectTo = '/hidet/home';
            return $this->redirectTo;
        } elseif (Auth::check() && Auth::user()->role_id == 2) {
            $this->redirectTo = '/wanaazegaj/home';
            return $this->redirectTo;
        } else {
            return $this->redirectTo = '/';
        }


//
//        switch (Auth::user()->role_id) {
//
//            case 1 :
//                $this->redirectTo = '/admin';
//                return $this->redirectTo;
//                break;
////            case 2:
////                $this->redirectTo = '/superhidet';
////                return $this->redirectTo;
////                break;
//            case 5:
//                $this->redirectTo = '/finance/home';
//                return $this->redirectTo;
//                break;
//            case 3:
//                $this->redirectTo = '/reporter';
//                return $this->redirectTo;
//                break;
//            default:
//                $this->redirectTo = '/login';
//                return $this->redirectTo;
//                break;
//        }
//        return $this->redirectTo = '/login';
    }

    public
    function username()
    {
        return 'username';
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected
    function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['active'] = '1';
//        return $request->only($this->username(), 'password');
        return $credentials;
    }
}
