<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalproducoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localproducoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->string('nome');
            $table->smallInteger('tipo')->comment('0 = padrão; 1 = Área comum; 2 = Unidade habitacional');
            $table->smallInteger('nivel');
            $table->integer('classificacao1')->nullable()->comment('Id do local alocado no nível 1 que faz parte da classificação do local cadastrado');
            $table->integer('classificacao2')->nullable()->comment('Id do local alocado no nível 2 que faz parte da classificação do local cadastrado');
            $table->integer('classificacao3')->nullable()->comment('Id do local alocado no nível 3 que faz parte da classificação do local cadastrado');
            $table->integer('classificacao4')->nullable()->comment('Id do local alocado no nível 4 que faz parte da classificação do local cadastrado');
            $table->text('descricao')->nullable();
            // Verificar se deve ser criado um relacionamento com a tabela de unidades habitacionais
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
        Schema::dropIfExists('localproducoes');
    }
}
