<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEtapaMauticToProcessCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('process_categories', function (Blueprint $table) {
            $table->string('etapa_mautic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('process_categories', function (Blueprint $table) {
            $table->dropColumn('etapa_mautic');
        });
    }
}
