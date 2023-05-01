<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('canteiro_id');
            $table->unsignedBigInteger('funcao_id');
            $table->decimal('valor', 10,2);
            $table->date('data_vigencia');
            $table->date('data_atualizacao')->nullable();
            $table->unsignedBigInteger('cad_user_id');
            $table->boolean('active')->default(true);
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('funcao_id')->references('id')->on('funcaos');
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
        Schema::dropIfExists('salarios');
    }
}
