<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deputado2017 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputados2017', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome')->nullable();
            $table->string('partido')->nullable();
            $table->string('tag_localizacao')->nullable();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deputados2017');
    }
}
