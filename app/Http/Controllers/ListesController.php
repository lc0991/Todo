<?php

namespace App\Http\Controllers;

use App\Http\Requests\Liste\ListeCreateRequest;
use App\Http\Requests\Liste\ListeUpdateRequest;
use App\Liste;

class ListesController extends Controller
{
    // Voir le dossier Requests pour toutes les vérifications de requêtes
    // Un utilisateur n'a AUCUN droit sur les listes des autres utilisateurs

    // On peut sauvegarder directement une liste car les attributs 'name' des formulaires
    // sont les même que les noms des colonnes des tables

    public function listListes()
    {
        return view('site/listes/listes');
    }

    public function updateListe(ListeUpdateRequest $req)
    {
        $liste = Liste::find($req->id);

        if(isset($req->remove))
        {
            $liste->delete();

            return redirect()->back()->with('status','Liste de tâches supprimée !');
        }

        $liste->update($req->all());

        $liste->save();

        return redirect()->back()->with('status','Liste de tâches mise à jour !');
    }

    public function createListe(ListeCreateRequest $req)
    {
        $liste = new Liste($req->all());

        $liste->save();

        return redirect()->back()->with('status','Liste de tâches sauvegardée !');
    }
}
