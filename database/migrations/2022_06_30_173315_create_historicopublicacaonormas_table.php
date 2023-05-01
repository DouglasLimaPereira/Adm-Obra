<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricopublicacaonormasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicopublicacaonormas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('norma_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('responsavel_id');
            $table->string('portaria');
            $table->date('data_publicacao');
            $table->text('descricao');
            $table->timestamps();

            $table->foreign('norma_id')->references('id')->on('normas');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('responsavel_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicopublicacoesnorma');
    }
}
