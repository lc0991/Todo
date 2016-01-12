<?php

namespace App\Http\Requests\Tache;

use App\Http\Requests\Request;
use App\Liste;
use Auth;

class TacheListRequest extends Request
{
    // On check si la LISTE de la TACHE appartient à l'utilisateur grâce à l'id_liste

    public function authorize()
    {
        if($current_liste = Liste::find($this->route('id_liste')))
        {
            if (Auth::user()->id == $current_liste->id_user)
            {
                return true;
            }
        }
        return false;
    }

    public function rules()
    {
        return [];
    }
}