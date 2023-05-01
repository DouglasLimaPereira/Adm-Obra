<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaoMedicaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcao_medicao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcao_id')->constrained('funcaos');
            $table->unsignedBigInteger('medicao_id');
            $table->foreign('medicao_id')->references('id')->on('medicoes');
            $table->timestamps();
        });
        // Comentário
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcao_medicao');
    }
}
