<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFuncaoTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_treinamento', function (Blueprint $table) {
            $table->unsignedBigInteger('funcao_id')->nullable()->after('curso_id');

            $table->foreign('funcao_id')->references('id')->on('funcaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
