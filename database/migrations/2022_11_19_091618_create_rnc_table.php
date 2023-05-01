<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rnc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->integer('estado');
            $table->integer('tipo');
            $table->integer('origem');
            $table->string('resumo');
            $table->string('evidencia');
            $table->integer('necessita_acao_correntiva')->nullable();
            $table->unsignedBigInteger('rnc_anterior_id')->nullable();
            $table->unsignedBigInteger('rnc_posterior_id')->nullable();
            $table->unsignedBigInteger('processo_id')->nullable();
            $table->unsignedBigInteger('inspecao_servico_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('unidade_habitacional_id')->nullable();
            $table->unsignedBigInteger('auditoria_id')->nullable();
            $table->text('descricao');
            $table->unsignedBigInteger('responsavel_identificacao_user_id');
            $table->text('correcao')->nullable();
            $table->unsignedBigInteger('responsavel_correcao_user_id')->nullable();
            $table->text('causas')->nullable();
            $table->unsignedBigInteger('responsavel_analise_user_id')->nullable();
            $table->timestamps();

            $table->foreign('rnc_anterior_id')->references('id')->on('rnc');
            $table->foreign('rnc_posterior_id')->references('id')->on('rnc');
            $table->foreign('processo_id')->references('id')->on('procedimentos');
            $table->foreign('inspecao_servico_id')->references('id')->on('inspecaoservicos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('unidade_habitacional_id')->references('id')->on('unidadehabitacionais');
            $table->foreign('auditoria_id')->references('id')->on('auditorias');
            $table->foreign('responsavel_identificacao_user_id')->references('id')->on('users');
            $table->foreign('responsavel_correcao_user_id')->references('id')->on('users');
            $table->foreign('responsavel_analise_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rnc');
    }
}
