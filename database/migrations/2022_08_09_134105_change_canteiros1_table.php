<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCanteiros1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canteiros', function (Blueprint $table) {
            $table->boolean('sabado')->nullable()->change();
            $table->boolean('domingo')->nullable()->change();
            $table->boolean('descanso')->nullable()->change();
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
