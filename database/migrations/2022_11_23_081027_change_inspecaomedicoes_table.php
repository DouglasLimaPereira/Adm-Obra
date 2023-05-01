<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInspecaomedicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspecaomedicoes', function (Blueprint $table) {
            $table->unsignedBigInteger('pacoteservico_id')->nullable()->after('pacote_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspecaomedicoes', function (Blueprint $table) {
            //
        });
    }
}
