<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->decimal('tolerancia_conformidade',10,2);
            $table->integer('periodicidade_conformidade');
            $table->float('tolerancia_residuos', 10,2);
            $table->integer('periodicidade_residuos');
            $table->float('tolerancia_energia', 10,2);
            $table->integer('periodicidade_energia');
            $table->float('tolerancia_agua', 10,2);
            $table->integer('periodicidade_agua');
            $table->foreignId('user_update_id')->constrained('users');
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
        Schema::dropIfExists('indicadores');
    }
}
