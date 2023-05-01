<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosubitemPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulosubitem_permissao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modulosubitem_id');
            $table->unsignedBigInteger('permissao_id');
            $table->foreign('modulosubitem_id')->references('id')->on('modulosubitens')->cascadeOnDelete();
            $table->foreign('permissao_id')->references('id')->on('permissoes')->cascadeOnDelete();
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
        Schema::dropIfExists('modulosubitem_permissao');
    }
}
