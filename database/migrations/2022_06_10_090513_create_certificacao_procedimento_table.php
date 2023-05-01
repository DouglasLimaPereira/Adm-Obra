<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificacaoProcedimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificacao_procedimento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('certificacao_id')->onDelete('cascade');
            $table->unsignedBigInteger('procedimento_id')->omDelete('cascade');
            $table->timestamps();

            $table->foreign('certificacao_id')->references('id')->on('certificacoes');
            $table->foreign('procedimento_id')->references('id')->on('procedimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificacao_procedimento');
    }
}
