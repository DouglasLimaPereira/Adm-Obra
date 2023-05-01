<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->string('nome');
            $table->integer('bloqueio_local');
            $table->integer('inspecao_parcial');
            $table->boolean('active')->default(true);
            $table->integer('visualizacao_cliente');
            $table->unsignedBigInteger('localproducao_id')->nullable()->comment("Código id do local de produção do tipo “Área comum” ou null caso o valor na coluna “visualizacao_cliente” não seja = 2");
            $table->text('descricao')->nullable();
            $table->decimal('duracao', 10, 2);
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
            $table->softDeletes();
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
        Schema::dropIfExists('pacotes');
    }
}
