<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('rnc_id')->constrained('rnc');
            $table->integer('estado');
            $table->text('descrcicao_acao');
            $table->foreignId('responsavel_user_id')->constrained('users');
            $table->integer('acao_implantada');
            $table->string('evidencia_implantacao')->nullable();
            $table->integer('acao_eficaz')->nullable();
            $table->date('data_prazo');
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
        Schema::dropIfExists('acoes');
    }
}
