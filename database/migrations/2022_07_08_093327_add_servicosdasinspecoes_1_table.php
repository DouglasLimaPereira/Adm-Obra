<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServicosdasinspecoes1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicosdasinspecoes', function (Blueprint $table) {
            $table->tinyInteger('qualidade')->after('data_termino_servico');
            $table->text('observacoes')->nullable()->after('data_termino_servico');
            $table->decimal('quantidade_inspecionada', 10, 2)->after('data_termino_servico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicosdasinspecoes', function (Blueprint $table) {
            //
        });
    }
}
