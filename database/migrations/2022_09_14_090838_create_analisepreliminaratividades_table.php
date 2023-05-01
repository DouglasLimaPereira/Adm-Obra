<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminaratividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminaratividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('usuario_revisao_id')->constrained('users');
            $table->integer('obrigatoriedade');
            $table->string('nome');
            $table->text('materiais');
            $table->text('descricao');
            $table->float('versao', 8, 2);
            $table->date('data_revisao');
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
        Schema::dropIfExists('analisepreliminaratividades');
    }
}
