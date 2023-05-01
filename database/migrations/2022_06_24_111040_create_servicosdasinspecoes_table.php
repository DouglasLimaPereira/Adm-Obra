<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosdasinspecoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicosdasinspecoes', function (Blueprint $table) {
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
            $table->foreignId('servico_id')->constrained('servicos');
            $table->decimal('porcentagem_inspecionada', 10,2)->nullable();
            $table->date('data_inspecao');
            $table->date('data_inicio_servico')->nullable();
            $table->date('data_termino_servico')->nullable();
            $table->foreign('localproducao_id')->references('id')->on('localproducoes')->after('porcentagem_inspecionada');
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
        Schema::dropIfExists('servicosdasinspecoes');
    }
}
