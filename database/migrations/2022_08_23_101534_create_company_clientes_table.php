<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyclientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->foreignId('pessoa_id')->constrained('pessoas');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('active');
            $table->string('imagem')->nullable();
            $table->string('imagem_origem')->nullable();
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
        Schema::dropIfExists('company_clientes');
    }
}
