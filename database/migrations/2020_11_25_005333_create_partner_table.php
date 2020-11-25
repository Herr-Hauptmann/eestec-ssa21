<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->string('link');
            $table->string('slika');
            $table->unsignedBigInteger('kategorija_id');
            $table->unsignedBigInteger('edicija_id');
            $table->timestamps();
            $table->foreign("kategorija_id")->references('id')->on('kategorija');
            $table->foreign("edicija_id")->references('id')->on('edicija');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner');
    }
}
