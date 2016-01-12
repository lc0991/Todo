<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\PasswordUpdateRequest;
use Auth;

class PasswordController extends Controller
{
    //

    public function updatePassword(PasswordUpdateRequest $req)
    {
        $user = Auth::user();
        $user->password = $req->new_password;
        $user->save();

        return redirect()->back()->with('status','Votre mot de passe a été modifié !');
    }
}
