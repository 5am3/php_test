<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class SocialController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToProvider()
    {
        return Socialite::driver('hyperion')->redirect();
    }

    public function handleProviderCallback()
    {
        $info = Socialite::driver('hyperion')->user()->user;

        $user = User::where('username', $info['username'])->first();
        if ($user) {
            Auth::login($user);
            if (Auth::check()) {
                return redirect('/home');
            }
        } else {
            $new_user = new User;
            $new_user->username = $info['username'];
            $new_user->email = $info['email'];
            $new_user->password = bcrypt(hash('sha256', 'ilovebirdway'));
            $new_user->avatar = $info['avatar'];
            $new_user->save();
            return  redirect('/');

        }
        return view('/home', ['info' => 'Login Failure']);
    }
}
