<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosubitensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulosubitens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modulo_id');
            $table->unsignedBigInteger('moduloitem_id');
            $table->string('nome');
            $table->string('slug');
            $table->boolean('active')->default(true);
            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->foreign('moduloitem_id')->references('id')->on('moduloitens');
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
        Schema::dropIfExists('modulosubitens');
    }
}
