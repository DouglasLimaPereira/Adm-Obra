<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificadoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('nome_fantasia');
            $table->string('razao_social')->unique();
            $table->string('cnpj', 14)->unique();
            $table->string('endereco');
            $table->string('email');
            $table->string('telefone', 14);
            $table->string('representante')->nullable();
            $table->text('descricao')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificadoras');
    }
}
