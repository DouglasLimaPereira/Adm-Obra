<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRegistroinspecaofinaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registroinspecaofinais', function (Blueprint $table) {
            $table->unsignedBigInteger('localproducao_id')->nullable();
            $table->integer('qualidade')->nullable();
            $table->integer('estado')->nullable();
            $table->text('observacoes')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->foreign('updated_user_id')->references('id')->on('users');
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
