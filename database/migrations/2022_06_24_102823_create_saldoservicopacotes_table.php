<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoservicopacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldoservicopacotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->unsignedBigInteger('localproducao_id');
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->foreignId('servico_id')->constrained('servicos');
            $table->decimal('saldo', 10,2);
            $table->foreign('localproducao_id')->references('id')->on('localproducoes');
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
        Schema::dropIfExists('saldoservicopacotes');
    }
}
