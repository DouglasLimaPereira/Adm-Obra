<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioexametiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarioexametipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('exametipo_id');
            $table->unsignedBigInteger('funcao_id');
            $table->date('data_exame');
            $table->string('anexo')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('situacao')->default(0)->comment('0-Não realizado; 1-Realizado; 2-Cancelado');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('exametipo_id')->references('id')->on('exametipos');
            $table->foreign('funcao_id')->references('id')->on('funcaos');
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
        Schema::dropIfExists('funcionarioexametipos');
    }
}
