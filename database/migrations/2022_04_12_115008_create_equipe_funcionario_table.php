<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipeFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_funcionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->constrained('equipes');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->foreignId('historicomembro_id')->constrained('historicomembros');
            $table->foreignId('canteirofuncionario_id')->constrained('canteirofuncionarios');
            $table->decimal('porcentagem', 10, 2);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('equipe_funcionario');
    }
}
