<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAnalisepreliminarregistros1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisepreliminarregistros', function (Blueprint $table) {
            $table->string('anexo')->nullable()->after('observacoes');
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
            //
        });
    }
}
