<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/login'; // path to the login URL
    protected $redirectPath = '/listes'; // path to the route where you want users to be redirected once logged in

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|between:6,60|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/',
            'g-recaptcha-response' => 'required|captcha',
        ],
            [
                'name.required' => 'Veuillez indiquer votre nom !',
                'name.max' => 'Votre nom est trop long (:max caractères maximum) !',
                'email.required' => 'Veuillez indiquer votre email !',
                'email.max' => 'Votre email est trop long (:max caractères maximum) !',
                'email.unique' => 'Votre email est déjà utilisé !',
                'password.required' => 'Veuillez indiquer votre mot de passe !',
                'password.confirmed' => 'La confirmation votre mot de passe est incorrecte !',
                'password.between' => 'Votre mot de passe doit varier entre :min et :max caractères !',
                'password.regex' => 'Votre mot de passe doit inclure au moins un nombre, un caractère spécial ($@$!%*#?&) et une lettre !',
                'g-recaptcha-response.required' => 'Veuillez valider le captcha !',
                'g-recaptcha-response.captcha' => 'Votre captcha est incorrect !',
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
