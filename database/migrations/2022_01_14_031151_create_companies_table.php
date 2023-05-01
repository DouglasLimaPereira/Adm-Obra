<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj', 14);
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cep', 8);
            $table->string('cidade');
            $table->string('uf');
            $table->string('email');
            $table->string('email_financeiro');
            $table->string('email_comercial');
            $table->string('telefone', 14);
            $table->string('whatsapp');
            $table->string('website');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('logotipo')->nullable();
            $table->char('logo_origem')->nullable();
            $table->decimal('limite_anexo',10,2);
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('companies');
    }
}
