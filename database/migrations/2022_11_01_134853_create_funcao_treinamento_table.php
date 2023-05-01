<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaoTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcao_treinamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcao_id');
            $table->unsignedBigInteger('treinamento_id');
            $table->timestamps();

            $table->foreign('funcao_id')->references('id')->on('funcaos');
            $table->foreign('treinamento_id')->references('id')->on('treinamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcao_treinamento');
    }
}
