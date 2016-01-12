<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    // Erreurs d'authorisation

    public function forbiddenResponse()
    {
        return redirect()->back()->withErrors('Vous n\'avez pas les autorisations nécessaires !');
    }
}
