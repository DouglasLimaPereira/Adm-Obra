<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExametiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exametipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->boolean('controlado')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('cad_user_id');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('exametipos');
    }
}
