<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbienteimagemPlantatipologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambienteimagem_plantatipologia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ambienteimagem_id')->constrained('ambienteimagens');
            $table->foreignId('plantatipologia_id')->constrained('plantatipologias');
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
        Schema::dropIfExists('ambienteimagem_plantatipologia');
    }
}
