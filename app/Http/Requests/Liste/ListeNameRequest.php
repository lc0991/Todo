<?php

namespace App\Http\Requests\Liste;

use App\Http\Requests\Request;

class ListeNameRequest extends Request
{
    public function rules()
    {
        // Pas de vérif de l'ID car il est déjà vérifié dans les enfants de cette classe

        return [
            'nom' => 'required|max:25',
            'description' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Veuillez indiquer le nom de la liste de tâches !',
            'nom.max' => 'Le nom de la liste de tâches est trop long (:max caractères maximum) !',
            'description.required' => 'Veuillez indiquer la description de la liste de tâches !',
            'description.max' => 'La description de la liste de tâches est trop longue (:max caractères maximum) !',
        ];
    }
}
