<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyRegistation;
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
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user->status == 1){
            if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
                return redirect()->intended(route('index'));
            }else{
                session()->flash('sticky_error','Invalid Login !!');
                return back();
            }

        }else{
            if (!is_null($user)){

                $user->notify(new VerifyRegistation($user));
                session()->flash('success','A New confirmation Email has sent to you...please check and confirm your Email ');
                return redirect('/');
            }else{
                session()->flash('sticky_error','Please login First !!');
                return redirect()->route('login');
            }
        }
    }
}
