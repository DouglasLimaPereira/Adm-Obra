<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->integer('tipo');
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('user_cad_id')->comment('usuario responsavel por realizar o cadastro deste item');
            $table->foreign('user_cad_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('funcaos');
    }
}
