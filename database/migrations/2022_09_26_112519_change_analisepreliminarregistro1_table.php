<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAnalisepreliminarregistro1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisepreliminarregistros', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_id')->after('data_registro');
            $table->unsignedBigInteger('vigencia_equipe_id')->after('equipe_id');
            $table->unsignedBigInteger('pacote_id')->after('vigencia_equipe_id');
            $table->integer('eficiente')->after('pacote_id');
            $table->foreignId('usu_registro_id')->after('eficiente');
            $table->unsignedBigInteger('usu_tecnico_id')->nullable()->after('usu_registro_id');
            $table->date('data_verificacao')->nullable()->after('usu_tecnico_id');
            $table->unsignedBigInteger('usu_eng_id')->nullable()->after('data_verificacao');
            $table->date('data_aprovacao')->nullable()->after('usu_eng_id');
            $table->text('observacoes')->after('data_aprovacao');
            
            $table->foreign('equipe_id')->references('id')->on('equipes');
            $table->foreign('vigencia_equipe_id')->references('id')->on('historicomembros');
            $table->foreign('pacote_id')->references('id')->on('pacotes');
            $table->foreign('usu_registro_id')->references('id')->on('users');
            $table->foreign('usu_tecnico_id')->references('id')->on('users');
            $table->foreign('usu_eng_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
