<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        } 
        else
        {
            $this->redirectTo = route('author.dashboard');
        }
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $usersocial = Socialite::driver('facebook')->user();

        //return $user->name;
        $findUser=User::where('email',$usersocial->email)->first();
        if($findUser)
        {
            Auth::login($findUser);
            return redirect()->back();
        }
        else
        {
            $user=new User;
            $user->name=$usersocial->name;
            //$user->username=$usersocial->name;
            $user->email=$usersocial->email;
            $user->password=bcrypt(123456);
            $user->save();
            Auth::login($user);
            return redirect()->back();  
        }
    }

    public function redirectToProvider1()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback1()
    {
        $user = Socialite::driver('google')->stateless()->user();

        return $user->token;
    }
}
