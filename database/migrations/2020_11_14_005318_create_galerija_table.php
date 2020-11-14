<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalerijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerija', function (Blueprint $table) {
            $table->id();
            $table->string('slika');
            $table->timestamps();
            $table->unsignedBigInteger('edicija_id');
            $table->foreign('edicija_id')->references('id')->on('edicija')
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
        Schema::dropIfExists('galerija');
    }
}
