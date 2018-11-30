<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Mckenziearts\LaravelOAuth\Traits\OAuthSocialite;

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

    use AuthenticatesUsers, OAuthSocialite;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function registerUser($provider, $user)
    {
        $userId = DB::table(config('laravel-oauth.users.table'))->insertGetId([
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->$user->avatar(),
            'phone' => $user->$user->phone(),
            'password'  => bcrypt('password'),
            $provider.'_id'    => $user->getId(),
            'email_verified_at'    => Carbon::now(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return $userId;
    }


}
