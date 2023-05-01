<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacotevigenciaprecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacotevigenciaprecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pacote_id')->constrained('pacotes');
            $table->date('data_vigencia');
            $table->decimal('preco_total', 10, 2);
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
        Schema::dropIfExists('pacotevigenciaprecos');
    }
}
