<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicaoSalarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicao_salario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicao_id');
            $table->foreignId('salario_id')->constrained();
            $table->foreign('medicao_id')->references('id')->on('medicoes');
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
        Schema::dropIfExists('medicao_salario');
    }
}
