<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_treinamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->onDelete('cascade');
            $table->unsignedBigInteger('treinamento_id')->onDelete('cascade');
            $table->integer('eficacia');
            $table->date('data_treinamento');
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('treinamento_id')->references('id')->on('treinamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario_treinamento');
    }
}
