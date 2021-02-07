<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdicijaPartnerKategorijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicija_partner_kategorija', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('edicija_id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('kategorija_id');
            $table->foreign('edicija_id')->references('id')->on('edicija')
                ->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('partner')
                ->onDelete('cascade');
            $table->foreign('kategorija_id')->references('id')->on('kategorija')
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
        Schema::dropIfExists('edicija_partner_kategorija');
    }
}
