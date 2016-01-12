<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_liste')->unsigned();
            $table->string('nom');
            $table->tinyInteger('priorite');
            $table->tinyInteger('etat')->default(0);
            $table->dateTime('echeance');
            $table->timestamps();
        });

        Schema::table('taches', function($table) {
            $table->foreign('id_liste')->references('id')->on('listes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taches');
    }
}
