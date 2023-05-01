<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeClassAprlocaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisepreliminarregistrolocais', function (Blueprint $table) {
            //oi
            $table->integer('class1')->nullable()->change();
            $table->integer('class2')->nullable()->change();
            $table->integer('class3')->nullable()->change();
            $table->integer('class4')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
