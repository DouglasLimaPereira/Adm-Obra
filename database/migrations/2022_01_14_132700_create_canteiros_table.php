<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanteirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteiros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->string('nome');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cep', 8);
            $table->string('cidade');
            $table->string('uf');
            $table->string('telefone', 14);
            $table->string('email');
            $table->decimal('limite_armazenamento', 10,2);
            $table->integer('total_funcionarios');
            $table->integer('total_unidades');
            $table->boolean('sabado')->default(false);
            $table->boolean('domingo')->default(false);
            $table->boolean('descanso')->default(false);
            $table->string('logotipo')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->integer('estado')->comment('gerencia a situacao do andamento da obra');
            $table->boolean('active')->default(true)->comment('define se um canteiro esta disponivel para acesso de usuarios');
            $table->char('logo_origem')->default('g');
            $table->unsignedBigInteger('cad_user_id')->comment('usuario superadmin responsavel pelo cadastro deste canteiro');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
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
        Schema::dropIfExists('canteiros');
    }
}
