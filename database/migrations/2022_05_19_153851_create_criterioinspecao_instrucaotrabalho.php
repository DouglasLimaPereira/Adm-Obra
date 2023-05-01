<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriterioinspecaoInstrucaotrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterioinspecao_instrucaotrabalho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterioinspecao_id');
            $table->unsignedBigInteger('instrucaotrabalho_id');
            $table->foreign('criterioinspecao_id')->references('id')->on('criterioinspecoes');
            $table->foreign('instrucaotrabalho_id')->references('id')->on('instrucaotrabalhos');
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
        Schema::dropIfExists('criterioinspecao_instrucaotrabalho');
    }
}
