<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAnalisepreliminaratividaderegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisepreliminarregistros', function (Blueprint $table) {
            $table->dropForeign('analisepreliminarregistros_localproducao_id_foreign');
            $table->dropColumn('localproducao_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisepreliminarregistros', function (Blueprint $table) {
           
        });
    }
}
