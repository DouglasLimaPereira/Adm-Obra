<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunastreinamentosTableTreinamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treinamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('treinador_id')->nullable()->change();
            $table->string('local_treinamento')->after('tipo_treinamento');
            $table->integer('tipo_curso')->nullable()->after('data_termino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treinamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('treinador_id')->nullable()->change();
            $table->dropColumn('local_treinamento');
            $table->dropColumn('tipo_curso');
        });
    }
}
