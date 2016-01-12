<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tache\TacheListRequest;
use App\Http\Requests\Tache\TacheCreateRequest;
use App\Http\Requests\Tache\TacheUpdateRequest;

use App\Liste;
use App\Tache;

class TachesController extends Controller
{
    // Voir le dossier Requests pour toutes les vérifications de requêtes
    // Un utilisateur n'a AUCUN droit sur les tâches des listes des autres utilisateurs

    // On peut sauvegarder directement une tâche car les attributs 'name' des formulaires
    // sont les même que les noms des colonnes des tables

    public function listTaches(TacheListRequest $req)
    {
        $current_liste = Liste::find($req->id_liste);

        return view('site/taches/taches')->with('current_liste', $current_liste);
    }

    public function updateTache(TacheUpdateRequest $req)
    {
        $tache = Tache::find($req->id);

        if(isset($req->remove))
        {
            $tache->delete();

            return redirect()->back()->with('status','Tâche supprimée !');
        }

        $tache->update($req->all());

        $tache->save();

        return redirect()->back()->with('status','Tâche mise à jour !');
    }

    public function createTache(TacheCreateRequest $req)
    {
        $tache = new Tache($req->all());

        $tache->save();

        return redirect()->back()->with('status','Tâche sauvegardée !');
    }
}
