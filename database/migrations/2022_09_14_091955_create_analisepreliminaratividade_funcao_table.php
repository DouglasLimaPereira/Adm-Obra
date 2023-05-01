<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminaratividadeFuncaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminaratividade_funcao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atividade_id')->constrained('analisepreliminaratividades');
            $table->foreignId('funcao_id')->constrained('funcaos');
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
        Schema::dropIfExists('analisepreliminaratividade_funcao');
    }
}
