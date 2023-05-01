<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunsFuncionarioTreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_treinamento', function (Blueprint $table) {
            $table->date('data_validade')->after('data_treinamento')->nullable();
            $table->integer('validade')->after('data_validade');
            $table->integer('ultimo')->after('validade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_treinamento', function (Blueprint $table) {
            $table->dropColumn('data_validade');
            $table->dropColumn('validade');
            $table->dropColumn('ultimo');
        });
    }
}
