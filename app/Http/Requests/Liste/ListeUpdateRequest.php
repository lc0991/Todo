<?php

namespace App\Http\Requests\Liste;

use Auth;
use App\Liste;

class ListeUpdateRequest extends ListeNameRequest
{
    // On check si la LISTE appartient à l'utilisateur grâce à son id

    public function authorize()
    {
        // Si la liste existe
        if($current_liste = Liste::find($this->id))
        {
            // Si la liste appartient à l'utilisateur
            if (Auth::user()->id == $current_liste->id_user)
            {
                return true;
            }
        }
        return false;
    }
}
