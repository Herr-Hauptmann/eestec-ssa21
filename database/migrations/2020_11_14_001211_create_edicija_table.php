<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdicijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicija', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->date('datum_pocetka');
            $table->date('datum_kraja');
            $table->string('mjesto_odrzavanja');
            $table->date('datum_otvaranja_prijava');
            $table->date('datum_zatvaranja_prijava');
            $table->integer('broj_ucesnika');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edicija');
    }
}
