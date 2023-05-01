<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMedicoes2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicoes', function (Blueprint $table) {
            $table->dropColumn('dias_horas_extras');
            $table->dropColumn('horas_dia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicoes', function (Blueprint $table) {
            //
        });
    }
}
