<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricorevisaopoliticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicorevisaopoliticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('politica_id');
            $table->unsignedBigInteger('responsavel_id');
            $table->float('versao');
            $table->date('data_revisao');
            $table->text('descricao')->nullable();
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('politica_id')->references('id')->on('politicas');
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
        Schema::dropIfExists('historicorevisaopoliticas');
    }
}
