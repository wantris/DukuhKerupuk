<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/konsumen/account/profil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
    public function login(Request $request)
    {


        if (Auth::guard('users')->attempt($request->only('username', 'password'), $request->filled('remember'))) {
            //Authentication passed...
            return redirect()
                ->intended(route('profile.konsumen'))
                ->with('status', 'You are Logged in as Konsumen!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout()
    {
        if (Auth::guard('users')->check()) // this means that the users was logged in.
        {
            Auth::guard('users')->logout();
            return redirect('/');
        }
    }
}
