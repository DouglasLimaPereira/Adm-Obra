<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCanteiros2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canteiros', function (Blueprint $table) {
            $table->boolean('sabado')->default(null)->change();
            $table->boolean('domingo')->default(null)->change();
            $table->boolean('descanso')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('canteiros', function (Blueprint $table) {
            //
        });
    }
}
