<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeExameregistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exameregistros', function (Blueprint $table) {
            $table->dropForeign('exameregistros_canteiro_id_foreign');
            $table->dropColumn('canteiro_id');
            $table->tinyInteger('estado_validade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exameregistros', function (Blueprint $table) {
            //
        });
    }
}
