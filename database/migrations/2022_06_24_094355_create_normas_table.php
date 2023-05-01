<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('codigo');
            $table->string('nome');
            $table->string('anexo_norma')->nullable();
            $table->boolean('controle_validade');
            $table->integer('validade_treinamento')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies');
            // Comentário
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normas');
    }
}
