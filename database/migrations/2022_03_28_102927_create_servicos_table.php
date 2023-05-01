<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('nome');
            $table->unsignedBigInteger('unidademedida_id');
            $table->unsignedBigInteger('icone_id');
            $table->integer('tipo');
            $table->text('descricao')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('unidademedida_id')->references('id')->on('unidademedidas');
            $table->foreign('icone_id')->references('id')->on('icones');
            $table->softDeletes();
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
        Schema::dropIfExists('servicos');
    }
}
