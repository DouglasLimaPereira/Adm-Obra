<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrucaoTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrucao_treinamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instrucaotrabalho_id');
            $table->unsignedBigInteger('treinamento_id');
            $table->timestamps();

            $table->foreign('instrucaotrabalho_id')->references('id')->on('instrucaotrabalhos');
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
        Schema::dropIfExists('instrucao_treinamento');
    }
}
