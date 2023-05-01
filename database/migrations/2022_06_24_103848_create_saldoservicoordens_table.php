<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoservicoordensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldoservicoordens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->foreignId('ordemservico_id')->constrained('ordemservicos');
            $table->foreignId('servico_id')->constrained('servicos');
            $table->decimal('saldo', 10,2);
            $table->tinyInteger('estado')->default(1);
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
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
        Schema::dropIfExists('saldoservicoordens');
    }
}
