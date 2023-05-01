<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyusers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('canteiro_id')->nullable();
            $table->unsignedBigInteger('pessoa_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('perfil_id')->nullable();
            $table->boolean('superadmin')->default(false);
            $table->boolean('active')->default(true);
            $table->string('imagem')->nullable();
            $table->char('imagem_origem')->nullable();
           
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('canteiro_id')->references('id')->on('canteiros');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('perfil_id')->references('id')->on('perfis');
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
        Schema::dropIfExists('companyusers');
    }
}
