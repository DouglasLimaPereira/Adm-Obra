<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminaratividadePacoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminaratividade_pacote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacote_id');
            $table->unsignedBigInteger('atividade_id');
            $table->timestamps();

            $table->foreign('atividade_id')->references('id')->on('analisepreliminaratividades');
            $table->foreign('pacote_id')->references('id')->on('pacotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisepreliminaratividade_pacote');
    }
}
