<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id');
            $table->unsignedBigInteger('treinador_id');
            $table->integer('tipo_treinamento');
            $table->integer('controle');
            $table->integer('validade')->default(0);
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->date('data_validade');
            $table->string('anexo')->nullable();
            $table->text('contribuicoes')->nullable();
            $table->text('justificativa')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('treinador_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treinamentos');
    }
}
