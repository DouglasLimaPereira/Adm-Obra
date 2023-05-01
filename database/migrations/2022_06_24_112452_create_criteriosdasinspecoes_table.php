<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriosdasinspecoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteriosdasinspecoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->foreignId('inspecaoservico_id')->constrained('inspecaoservicos');
            $table->foreignId('ordemservico_id')->constrained('ordemservicos');
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->foreignId('pacotevigenciapreco_id')->constrained('pacotevigenciaprecos');
            $table->unsignedBigInteger('localproducao_id');
            $table->unsignedBigInteger('criterioinspecao_id');
            $table->tinyInteger('qualidade');
            $table->date('data_inspecao');
            $table->text('observacoes')->nullable();
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
            $table->foreign('criterioinspecao_id')->references('id')->on('criterioinspecoes');
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
        Schema::dropIfExists('criteriosdasinspecoes');
    }
}
