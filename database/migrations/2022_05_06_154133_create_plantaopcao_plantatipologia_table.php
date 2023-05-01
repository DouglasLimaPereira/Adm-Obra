<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantaopcaoPlantatipologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantaopcao_plantatipologia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plantatipologia_id')->constrained('plantatipologias')->onDelete('cascade');
            $table->unsignedBigInteger('plantaopcao_id');
            $table->foreign('plantaopcao_id')->references('id')->on('plantaopcoes')->onDelete('cascade');
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
        Schema::dropIfExists('plantaopcao_plantatipologia');
    }
}
