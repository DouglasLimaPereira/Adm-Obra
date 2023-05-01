<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('canteiro_id');
            $table->decimal('indice_produtivo', 10,2);
            $table->decimal('indice_improdutivo', 10,2);
            $table->decimal('indice_feriado', 10,2);
            $table->date('data_vigencia');
            $table->unsignedBigInteger('cad_user_id');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('cad_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fatores');
    }
}
