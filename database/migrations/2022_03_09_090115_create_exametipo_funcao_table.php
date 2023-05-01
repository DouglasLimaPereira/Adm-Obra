<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExametipoFuncaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exametipo_funcao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exametipo_id');
            $table->unsignedBigInteger('funcao_id');
            $table->foreign('exametipo_id')->references('id')->on('exametipos');
            $table->foreign('funcao_id')->references('id')->on('funcaos');
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
        Schema::dropIfExists('exametipo_funcao');
    }
}
