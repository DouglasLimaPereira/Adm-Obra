<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemregistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagemregistros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->foreignId('ambienteimagem_id')->constrained('ambienteimagens');
            $table->foreignId('localproducao_id')->constrained('localproducoes');
            $table->string('anexo');
            $table->date('data_imagem');
            $table->integer('tipo');
            $table->foreignId('created_user_id')->constrained('users');
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->timestamps();

            $table->foreign('updated_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagemregistros');
    }
}
