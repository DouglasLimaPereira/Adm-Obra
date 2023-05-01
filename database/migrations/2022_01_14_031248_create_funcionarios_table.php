<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('pessoa_id');
            $table->string('matricula');
            $table->boolean('situacao_admissional');
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('cad_user_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
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
        Schema::dropIfExists('funcionarios');
    }
}
