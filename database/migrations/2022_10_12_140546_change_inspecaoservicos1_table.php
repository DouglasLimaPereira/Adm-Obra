<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInspecaoservicos1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspecaoservicos', function (Blueprint $table) {
            $table->boolean('visto_engenheiro')->default(false);
            $table->date('visto_engenheiro_data')->nullable();
            $table->unsignedBigInteger('visto_engenheiro_user_id')->nullable();
            $table->foreign('visto_engenheiro_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspecaoservicos', function (Blueprint $table) {
            //
        });
    }
}
