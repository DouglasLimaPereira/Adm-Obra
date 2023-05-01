<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExametipovalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exametipovalidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('exametipo_id');
            $table->integer('validade');
            $table->integer('ordem');
            $table->boolean('active')->default(true);
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('exametipo_id')->references('id')->on('exametipos');
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
        Schema::dropIfExists('exametipovalidades');
    }
}
