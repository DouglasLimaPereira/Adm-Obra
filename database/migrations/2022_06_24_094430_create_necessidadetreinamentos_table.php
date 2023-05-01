<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNecessidadetreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('necessidadetreinamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('certificacao_id')->nullable();
            $table->unsignedBigInteger('procedimento_id')->nullable();
            $table->unsignedBigInteger('norma_id')->nullable();
            $table->unsignedBigInteger('instrucaotrabalho_id')->nullable();
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->integer('tipo_treinamento');

            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
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
        Schema::dropIfExists('necessidadetreinamentos');
    }
}
