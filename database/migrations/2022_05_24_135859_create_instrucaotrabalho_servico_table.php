<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrucaotrabalhoServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrucaotrabalho_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrucaotrabalho_id')->constrained('instrucaotrabalhos');
            $table->foreignId('servico_id')->constrained('servicos');
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
        Schema::dropIfExists('instrucaotrabalho_servico');
    }
}
