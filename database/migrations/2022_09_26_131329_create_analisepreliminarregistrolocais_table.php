<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisepreliminarregistrolocaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisepreliminarregistrolocais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('apr_registro_id')->constrained('analisepreliminarregistros');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->foreignId('local_id')->constrained('localproducoes');
            $table->integer('nivel');
            $table->integer('class1');
            $table->integer('class2');
            $table->integer('class3');
            $table->integer('class4');
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
        Schema::dropIfExists('analisepreliminarregistrolocais');
    }
}
