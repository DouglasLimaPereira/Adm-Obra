<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspecaofinalcorrecoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecaofinalcorrecoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('registroinspecaofinal_id');
            $table->integer('classificacao_numero');
            $table->integer('servico_numero');
            $table->text('descricao_defeitos');
            $table->tinyInteger('correcao')->nullable();
            $table->tinyInteger('aprovacao')->nullable();
            $table->date('data_visto')->nullable();
            $table->string('responsavel_correcao');
            $table->timestamps();

            $table->foreign('registroinspecaofinal_id')->references('id')->on('registroinspecaofinais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspecaofinalcorrecoes');
    }
}
