<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaofuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcaofuncionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('funcao_id');
            $table->date('data_atribuicao');
            $table->boolean('active')->default(true);
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('funcao_id')->references('id')->on('funcaos');
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
        Schema::dropIfExists('funcaofuncionarios');
    }
}
