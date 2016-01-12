<?php

namespace App\Http\Requests\Tache;

use App\Liste;
use Auth;

class TacheCreateRequest extends TacheNameRequest
{
    // On check si la LISTE de la TACHE appartient à l'utilisateur grâce à l'id_liste

    public function authorize()
    {
        if($current_liste = Liste::find($this->id_liste))
        {
            if (Auth::user()->id == $current_liste->id_user)
            {
                return true;
            }
        }
        return false;
    }
}
