<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdicijaTrenerTreningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicija_trener_trening', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('edicija_id');
            $table->unsignedBigInteger('trener_id');
            $table->unsignedBigInteger('trening_id');
            $table->foreign('edicija_id')->references('id')->on('edicija')
                ->onDelete('cascade');
            $table->foreign('trener_id')->references('id')->on('trener')
                ->onDelete('cascade');
            $table->foreign('trening_id')->references('id')->on('trening')
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
        Schema::dropIfExists('edicija_trener_trening');
    }
}
