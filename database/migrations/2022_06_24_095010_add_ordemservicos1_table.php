<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdemservicos1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordemservicos', function (Blueprint $table) {
            $table->tinyInteger('nivel');
            $table->unsignedInteger('classificacao1')->nullable()->after('localproducao_id');
            $table->unsignedInteger('classificacao2')->nullable();
            $table->unsignedInteger('classificacao3')->nullable();
            $table->unsignedInteger('classificacao4')->nullable();
            $table->tinyInteger('estado_conclusao')->default(1);
            $table->tinyInteger('estado_andamento')->default(1);
            $table->tinyInteger('estado_qualidade')->default(1);
            $table->decimal('porcentagem_inspecionada')->default(0);
            $table->date('previsao_inicio');
            $table->date('previsao_termino');
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->text('descricao')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordemservicos', function (Blueprint $table) {
            //
        });
    }
}
