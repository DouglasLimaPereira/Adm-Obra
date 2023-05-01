<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilpermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilpermissoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id')->nullable();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('modulo_id');
            $table->unsignedBigInteger('moduloitem_id');
            $table->unsignedBigInteger('modulosubitem_id');
            $table->unsignedBigInteger('permissao_id');
            $table->string('permissao_slug');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('perfil_id')->references('id')->on('perfis');
            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->foreign('moduloitem_id')->references('id')->on('moduloitens');
            $table->foreign('modulosubitem_id')->references('id')->on('modulosubitens');
            $table->foreign('permissao_id')->references('id')->on('permissoes');
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
        Schema::dropIfExists('perfilpermissoes');
    }
}
