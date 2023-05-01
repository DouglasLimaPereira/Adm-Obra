<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicoes1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicoes', function (Blueprint $table) {
            $table->tinyInteger('tipo')->default(1)->after('canteiro_id');
            $table->tinyInteger('estado')->default(1)->after('tipo');
            $table->foreignId('atualizacao_user_id')->nullable()->constrained('users');
            $table->foreignId('fechamento_user_id')->nullable()->constrained('users');
            $table->boolean('sabado_produtivo')->nullable();
            $table->boolean('domingo_produtivo')->nullable();
            $table->tinyInteger('considerar_faltas')->nullable();
            $table->integer('dias_horas_extras')->nullable();
            $table->boolean('considerar_horas_extras')->nullable();
            $table->tinyInteger('ratear_desconto_faltas')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicoes', function (Blueprint $table) {
            //
        });
    }
}
