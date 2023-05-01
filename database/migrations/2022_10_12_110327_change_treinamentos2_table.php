<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTreinamentos2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treinamentos', function (Blueprint $table) {
            $table->dropForeign('treinamentos_treinador_id_foreign');
            $table->dropColumn('treinador_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treinamentos', function (Blueprint $table) {
            //
        });
    }
}
