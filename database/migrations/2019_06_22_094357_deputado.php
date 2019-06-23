<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deputado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputados', function (Blueprint $table) {
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
        Schema::dropIfExists('deputados');
    }
}
