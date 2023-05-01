<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServicos1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->unsignedBigInteger('classificacao_id')->nullable()->after('descricao');
            $table->foreign('classificacao_id')->references('id')->on('classificacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            //
        });
    }
}
