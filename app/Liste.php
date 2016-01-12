<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    //
    protected $fillable=['id','id_user','nom','description'];

    public function taches()
    {
        return $this->hasMany('App\Tache','id_liste')->orderBy('priorite', 'desc');
    }
}
