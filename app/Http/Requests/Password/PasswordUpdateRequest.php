<?php

namespace App\Http\Requests\Password;

use App\Http\Requests\Request;
use Auth;

class PasswordUpdateRequest extends Request
{
    public function authorize()
    {
        if(Auth::user()->checkPassword($this->old_password))
        {
            return true;
        }
        return false;
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->withErrors('Votre ancien mot de passe est incorrect !');
    }

    public function rules()
    {
        return [
            'new_password' => 'required|confirmed|between:6,60|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/'
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Veuillez indiquer votre nouveau mot de passe',
            'new_password.confirmed' => 'La confirmation de votre nouveau mot de passe est incorrecte !',
            'new_password.between' => 'Votre mot de passe doit varier entre :min et :max caractères !',
            'new_password.regex' => 'Votre mot de passe doit inclure au moins un nombre, un caractère spécial ($@$!%*#?&) et une lettre !'
        ];
    }
}
