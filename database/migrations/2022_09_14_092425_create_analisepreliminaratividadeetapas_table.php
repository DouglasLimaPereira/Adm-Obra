<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminaratividadeetapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminaratividadeetapas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('atividade_id')->constrained('analisepreliminaratividades');
            $table->text('descricao_etapa');
            $table->integer('rotineira');
            $table->text('perigos');
            $table->string('agente_riscos');
            $table->text('possiveis_danos');
            $table->integer('probabilidade');
            $table->integer('gravidade');
            $table->string('grau_risco');
            $table->string('medidas_controle');
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
        Schema::dropIfExists('analisepreliminaratividadeetapas');
    }
}
