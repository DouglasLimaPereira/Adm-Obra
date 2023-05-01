<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipeHistoricomembroOrdemservicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_historicomembro_ordemservicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('ordemservico_id')->constrained('ordemservicos');
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
        Schema::dropIfExists('equipe_historicomembro_ordemservicos');
    }
}
