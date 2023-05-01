<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdicionandocolunasTableFuncionarioTreinamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_treinamento', function (Blueprint $table) {
            $table->unsignedBigInteger('certificacao_id')->nullable()->after('treinamento_id');
            $table->unsignedBigInteger('procedimento_id')->nullable()->after('certificacao_id');
            $table->unsignedBigInteger('norma_id')->nullable()->after('procedimento_id');
            $table->unsignedBigInteger('instrucao_id')->nullable()->after('norma_id');
            $table->unsignedBigInteger('curso_id')->nullable()->after('instrucao_id');
            $table->integer('tipo_treinamento')->after('eficacia');

            $table->foreign('certificacao_id')->references('id')->on('certificacoes');
            $table->foreign('procedimento_id')->references('id')->on('procedimentos');
            $table->foreign('norma_id')->references('id')->on('normas');
            $table->foreign('instrucao_id')->references('id')->on('instrucaotrabalhos');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_treinamento', function (Blueprint $table) {
            $table->dropForeign('instrucao_treinamento_certificacao_id_foreign');
            $table->dropForeign('instrucao_treinamento_procedimento_id_foreign');
            $table->dropForeign('instrucao_treinamento_norma_id_foreign');
            $table->dropForeign('instrucao_treinamento_instrucao_id_foreign');
            $table->dropForeign('instrucao_treinamento_curso_id_foreign');

            $table->dropColumn('certificacao_id');
            $table->dropColumn('procedimento_id');
            $table->dropColumn('norma_id');
            $table->dropColumn('instrucao_id');
            $table->dropColumn('curso_id');
            $table->dropColumn('tipo_treinamento');
        });
    }
}
