<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadehabitacionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidadehabitacionais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('localproducao_id');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes');
            $table->smallInteger('estado')->default(1);
            $table->foreignId('plantatipologia_id')->nullable()->constrained('plantatipologias');
            $table->unsignedBigInteger('plantaopcao_id')->nullable();
            $table->string('pavimento');
            $table->text('nome');
            $table->text('descricao')->nullable();
            $table->date('data_entrega')->nullable();
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
            $table->foreign('plantaopcao_id')->references('id')->on('plantaopcoes');
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
        Schema::dropIfExists('unidadehabitacionais');
    }
}
