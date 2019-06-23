<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Verba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deputado_id')->nullable()->unsigned();
            $table->foreign('deputado_id')->references('id')->on('deputados2017')->onDelete('cascade');
            $table->string('descTipoDespesa')->nullable(true);
            $table->string('mesReferencia')->nullable(true);
            $table->double('valorReembolsado', 10, 2)->nullable(true);
            $table->string('dataEmissao')->nullable(true);
            $table->string('cpfCnpj')->nullable(true);
            $table->double('valorDespesa', 10, 2)->nullable(true);
            $table->string('nomeEmitente')->nullable(true);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verbas');
    }
}

