<?php

namespace App\Http\Requests\Tache;

use App\Liste;
use App\Tache;
use Auth;

class TacheUpdateRequest extends TacheNameRequest
{
    // On récupère la tâche grâce à son id et on détermine sa LISTE grâce à l'id_liste de la TACHE
    // Puis on check si la LISTE de la TACHE appartient à l'utilisateur

    public function authorize()
    {
        if($current_tache = Tache::find($this->id))
        {
            if($current_liste = Liste::find($current_tache->id_liste))
            {
                if (Auth::user()->id == $current_liste->id_user)
                {
                    return true;
                }
            }
        }
        return false;
    }
}
