<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaotreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcaotreinamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_treinamento');
            $table->foreignId('certificacao_id')->nullable();
            $table->foreignId('procedimento_id')->nullable();
            $table->foreignId('norma_id')->nullable();
            $table->foreignId('instrucaotrabalho_id')->nullable();
            $table->foreignId('curso_id')->nullable();
            $table->timestamps();

            $table->foreign('certificacao_id')->references('id')->on('certificacoes');
            $table->foreign('procedimento_id')->references('id')->on('procedimentos');
            $table->foreign('norma_id')->references('id')->on('normas');
            $table->foreign('instrucaotrabalho_id')->references('id')->on('instrucaotrabalhos');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcaotreinamentos');
    }
}
