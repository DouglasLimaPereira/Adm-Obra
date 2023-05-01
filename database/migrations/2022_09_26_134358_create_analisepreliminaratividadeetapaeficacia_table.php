<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminaratividadeetapaeficaciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminaratividadeetapaeficacia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('atividade_id')->constrained('analisepreliminaratividades');
            $table->foreignId('etapa_id')->constrained('analisepreliminaratividadeetapas');
            $table->foreignId('apr_registro_id')->constrained('analisepreliminarregistros');
            $table->integer('eficiente');
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
        Schema::dropIfExists('analisepreliminaratividadeetapaeficacia');
    }
}
