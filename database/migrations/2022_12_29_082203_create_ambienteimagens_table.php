<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbienteimagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambienteimagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('canteiro_id')->constrained('canteiros');
            $table->string('nome');
            $table->integer('tipo');
            $table->text('descricao');
            $table->foreignId('created_user_id')->constrained('users');
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->timestamps();

            $table->foreign('updated_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambienteimagens');
    }
}
