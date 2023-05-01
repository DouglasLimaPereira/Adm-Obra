<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePacotevigenciaprecoservicos3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacotevigenciaprecoservicos', function (Blueprint $table) {
            $table->decimal('peso_servico', 10, 2)->nullable()->after('preco_total_servico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacotevigenciaprecoservicos', function (Blueprint $table) {
            //
        });
    }
}
