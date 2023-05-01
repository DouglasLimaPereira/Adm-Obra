<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTipoNecessidadeNecessidadeTreinamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('necessidadetreinamentos', function (Blueprint $table) {
            $table->integer('tipo_necessidade')->after('company_id')->nullable();
            $table->date('data_vencimento')->after('tipo_necessidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('necessidadetreinamentos', function (Blueprint $table) {
            $table->dropColumn('tipo_necessidade');
            $table->dropColumn('data_vencimento');
        });
    }
}
