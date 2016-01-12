<?php

namespace App\Http\Requests\Liste;

use Auth;

class ListeCreateRequest extends ListeNameRequest
{
    // On autorise car il n'y a rien à vérifier...

    public function authorize()
    {
        return true;
    }

    // On ajoute id_user dans la Requête (plus facile pour ajouter une liste dans le contrôleur)

    public function all()
    {
        $data = parent::all();
        $data['id_user'] = Auth::user()->id;
        return $data;
    }
}
