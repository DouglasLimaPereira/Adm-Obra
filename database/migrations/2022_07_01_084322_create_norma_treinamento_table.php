<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormaTreinamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('norma_treinamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('norma_id')->onDelete('cascade');
            $table->unsignedBigInteger('treinamento_id')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('norma_id')->references('id')->on('normas');
            $table->foreign('treinamento_id')->references('id')->on('treinamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('norma_treinamento');
    }
}
