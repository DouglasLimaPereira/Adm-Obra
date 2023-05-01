<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontofuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontofuncionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('pontodiario_id');
            $table->Integer('estado');
            $table->date('data_ponto');
            $table->time('horaextra')->default('00:00');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('pontodiario_id')->references('id')->on('pontodiarios');
        });
        //Comments
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pontofuncionarios');
    }
}
