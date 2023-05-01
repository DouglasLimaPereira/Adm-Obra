<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCertificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificacoes', function (Blueprint $table) {
            if(!Schema::hasColumn('certificacoes', 'vencido'))
            {
                $table->integer('vencido')->default(0)->comment(' 0 = Não vencida; 1 = Vencida');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificacoes', function (Blueprint $table) {
            //
        });
    }
}
