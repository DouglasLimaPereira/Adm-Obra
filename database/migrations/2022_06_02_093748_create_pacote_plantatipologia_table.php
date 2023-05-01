<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacotePlantatipologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacote_plantatipologia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plantatipologia_id')->constrained('plantatipologias');
            $table->foreignId('pacote_id')->constrained('pacotes');
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
        Schema::dropIfExists('pacote_plantatipologia');
    }
}
