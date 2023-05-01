<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyFuncaotreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcaotreinamentos', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained('companies')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcaotreinamentos', function (Blueprint $table) {
            $table->dropForeign('funcaotreinamento_company_id_foreign');
            $table->dropColumn('company_id');

        });
    }
}
