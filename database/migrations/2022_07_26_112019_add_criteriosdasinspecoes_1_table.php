<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCriteriosdasinspecoes1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criteriosdasinspecoes', function (Blueprint $table) {
            $table->foreignId('servico_id')->after('pacotevigenciapreco_id')->constrained('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('criteriosdasinspecoes', function (Blueprint $table) {
            //
        });
    }
}
