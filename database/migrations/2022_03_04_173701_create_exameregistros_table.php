<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExameregistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exameregistros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id')->nullable();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('exametipo_id');
            $table->string('anexo')->nullable();
            $table->text('descricao')->nullable();
            $table->integer('validade');
            $table->integer('validade_ordem');
            $table->dateTime('data_exame');
            $table->dateTime('data_vencimento');
            $table->boolean('ultimo_exame')->default(false);
            $table->unsignedBigInteger('cad_user_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('exametipo_id')->references('id')->on('exametipos');
            $table->foreign('cad_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('exameregistros');
    }
}
