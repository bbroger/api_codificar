<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RedeSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rede_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('redeSocial')->nullable();
            $table->integer('deputado_id')->nullable()->unsigned();
            $table->foreign('deputado_id')->references('id')->on('deputados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rede_socials');
    }
}
