<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInspecaoservicos1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspecaoservicos', function (Blueprint $table) {
            $table->tinyInteger('nivel')->after('pacotevigenciapreco_id');
            $table->unsignedInteger('classificacao1')->nullable()->after('nivel');
            $table->unsignedInteger('classificacao2')->nullable()->after('classificacao1');
            $table->unsignedInteger('classificacao3')->nullable()->after('classificacao2');
            $table->unsignedInteger('classificacao4')->nullable()->after('classificacao3');
            $table->unsignedBigInteger('localproducao_id')->after('classificacao4');
            $table->tinyInteger('tipo')->after('localproducao_id');
            $table->tinyInteger('qualidade')->after('tipo');
            $table->tinyInteger('acao')->after('qualidade')->comment('1 = Aceitar como está; 2 = Aceitar sob concessão; 3 = Não aceitar: Trocar parte errada; 4 = Não aceitar: Consertar parte errada');
            $table->unsignedBigInteger('inspetor_id')->after('acao');
            $table->decimal('porcentagem_inspecionada', 10,2)->nullable();
            $table->date('data_inspecao')->nullable();
            $table->foreign('inspetor_id')->references('id')->on('users')->after('inspetor_id');
            $table->foreign('localproducao_id')->references('id')->on('localproducoes')->after('porcentagem_inspecionada');
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
