<?php

namespace GymWeb\Http\Controllers\Admin\Auth;

use GymWeb\User;
use Validator;
use GymWeb\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use GymWeb\Traits\GymwebAuthenticate;

class AuthAdminController extends Controller
{
    
    
    protected $username ="username";

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use GymwebAuthenticate, ThrottlesLogins;


    // protected $guard = "web";

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admgym/dashboard';


     /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout = "admgym/auth/login";
    
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $loginView = 'admin.auth.login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:member',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
