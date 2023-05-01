<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInspecaoservicos2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspecaoservicos', function (Blueprint $table) {
            $table->foreignId('inspecaoservico_id')->nullable()->constrained('inspecaoservicos');
            $table->tinyInteger('disponibilidade_reinspecao');
            $table->foreignId('concessao_user_id')->nullable()->constrained('users');
            $table->string('evidencia1')->nullable();
            $table->string('evidencia2')->nullable();
            $table->string('evidencia3')->nullable();
            $table->longText('consideracoes_finais')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspecaoservicos', function (Blueprint $table) {
            //
        });
    }
}
