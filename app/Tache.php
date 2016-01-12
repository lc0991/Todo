<?php

namespace App;

//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    //
    protected $fillable=['id','id_liste','nom','priorite','etat','echeance'];
}
