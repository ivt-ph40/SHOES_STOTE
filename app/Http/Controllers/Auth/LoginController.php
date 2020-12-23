<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

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

    use AuthenticatesUsers; //use methods such as login() in (class) AuthenticatesUsers trait

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('users.login');
    }

    public function login(LoginRequest $request){
        $data =  $request->only('email', 'password');
        if(\Auth::attempt($data)){
            if(\Auth::user()->role_id == 1){
                return redirect()->route('home.admins',\Auth::user()->first_name);
            }
            elseif(\Auth::user()->role_id == 2){
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('fail', 'Email, password is wrong. Please try again!!')->withInput();
    }
    public function logout(Request $request){
        \Auth::logout();
        return redirect()->route('login');
    }
}
