<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFuncionarioMedicaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_medicao', function (Blueprint $table) {
            $table->foreignId('canteirofuncionario_id')->after('funcionario_id')->nullable()->constrained('canteirofuncionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_medicao', function (Blueprint $table) {
            //
        });
    }
}
