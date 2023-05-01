<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id');
            $table->integer('tipo');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->decimal('valor', 10,2);
            $table->string('nome');
            $table->longText('descricao');
            $table->integer('estado');
            $table->unsignedBigInteger('fornecedor_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('medicoes');
    }
}
