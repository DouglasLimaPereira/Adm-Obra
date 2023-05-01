<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSaldoservicopacotes1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saldoservicopacotes', function (Blueprint $table) {
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
        Schema::table('saldoservicopacotes', function (Blueprint $table) {
            //
        });
    }
}
