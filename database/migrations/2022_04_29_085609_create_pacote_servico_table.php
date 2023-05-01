<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacoteServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacote_servico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacote_id');
            $table->foreign('pacote_id')->references('id')->on('pacotes')->onDelete('cascade');
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
            $table->decimal('quantidade_servico', 10, 2);
            $table->decimal('duracao_servico', 10, 2);
            $table->unsignedSmallInteger('inspecao_parcial');
            $table->decimal('produtividade', 10, 2);
            $table->decimal('peso_servico', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacote_servico');
    }
}
