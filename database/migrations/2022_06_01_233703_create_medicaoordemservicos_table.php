<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicaoordemservicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaoordemservicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('medicao_id');
            $table->foreignId('ordermservico_id')->constrained('ordemservicos');
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->foreignId('pacotevigenciapreco_id')->constrained('pacotevigenciaprecos');
            $table->unsignedBigInteger('localproducao_id');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->foreign('medicao_id')->references('id')->on('medicoes');
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
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
        Schema::dropIfExists('medicaoordemservicos');
    }
}
