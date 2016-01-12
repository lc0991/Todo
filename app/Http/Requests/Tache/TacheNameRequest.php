<?php

namespace App\Http\Requests\Tache;

use App\Http\Requests\Request;

class TacheNameRequest extends Request
{
    public function messages()
    {
        return [
            'nom.required' => 'Veuillez indiquer le nom de la tâche !',
            'nom.max' => 'Le nom de la tâche est trop long (:max caractères maximum) !',
            'priorite.required' => 'Veuillez indiquer la priorité de la tâche !',
            'priorite.between' => 'La priorité de la tâche doit se trouver entre :max et :min !',
            'etat.required' => 'Veuillez indiquer l\'état de la tâche !',
            'etat.between' => 'L\'état de la tâche doit se trouver entre :max et :min !',
            'echeance.required' => 'Veuillez indiquer l\'échéance de la tâche !',
            'echeance.date_format' => 'Le format de la date d\'échéance de la tâche est mauvais !',
        ];
    }

    public function rules()
    {
        // Pas de vérif de l'ID et ID_liste car ils sont déjà vérifiés dans les enfants de cette classe
        return [
            'nom' => 'required|max:35',
            'priorite' => 'required|integer|between:0,100',
            'etat' => 'required|integer|between:0,1',
            'echeance' => 'required|date_format:Y-m-d H:i'
        ];
    }
}
