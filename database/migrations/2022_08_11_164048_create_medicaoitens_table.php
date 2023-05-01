<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicaoitensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaoitens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('medicao_id');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->decimal('desconto', 10,2)->nullable();
            $table->decimal('acrescimo', 10,2)->nullable();
            $table->decimal('producao', 10,2)->nullable();
            $table->longText('observacoes')->nullable();
            $table->foreign('medicao_id')->references('id')->on('medicoes');
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
        Schema::dropIfExists('medicaoitens');
    }
}
