<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspecaoservicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecaoservicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->foreignId('ordemservico_id')->constrained('ordemservicos');
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->foreignId('pacotevigenciapreco_id')->constrained('pacotevigenciaprecos');
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
        Schema::dropIfExists('inspecaoservicos');
    }
}
