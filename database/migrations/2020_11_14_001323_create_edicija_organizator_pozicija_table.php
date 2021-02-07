<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdicijaOrganizatorPozicijaTable extends Migration
{
    /*
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicija_organizator_pozicija', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('edicija_id');
            $table->unsignedBigInteger('organizator_id');
            $table->unsignedBigInteger('pozicija_id');
            $table->foreign('edicija_id')->references('id')->on('edicija')
                ->onDelete('cascade');
            $table->foreign('organizator_id')->references('id')->on('organizator')
                ->onDelete('cascade');
            $table->foreign('pozicija_id')->references('id')->on('pozicija')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edicija_organizator_pozicija');
    }
}
