<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePacotevigenciaprecoservicos4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacotevigenciaprecoservicos', function (Blueprint $table) {
            $table->decimal('peso_servico', 10,4)->change();
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
