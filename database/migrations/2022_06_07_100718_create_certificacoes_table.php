<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('certificadora_id');
            $table->string('nome');
            $table->string('anexo_norma')->nullable();
            $table->text('descricao')->nullable();
            $table->string('versao_certificada');
            $table->date('data_publicacao');
            $table->date('data_certificacao')->nullable();
            $table->date('data_validade')->nullable();
            $table->string('anexo_certificado')->nullable();
            $table->integer('estado')->default(1)->comment('1 = Em implementação 
            2 = Implementada');
            $table->integer('vencido')->default(0)->comment(' 0 = Não vencida 
            1 = Vencida');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('certificadora_id')->references('id')->on('certificadoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificacoes');
    }
}
