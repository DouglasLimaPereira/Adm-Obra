<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanteirofuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteirofuncionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('canteiro_id')->nullable();
            $table->unsignedBigInteger('funcionario_id');
            $table->boolean('gerente')->default(false);
            $table->date('data_vinculo');
            $table->date('data_desligamento')->nullable();
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('canteirofuncionarios');
    }
}
