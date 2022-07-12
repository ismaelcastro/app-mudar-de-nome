<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusBreveRelatoToCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->enum('status_breve_relato', array_keys(\App\Models\Call::STATUS_BREVE_RELATO))->default('new');
            $table->dateTime('update_breve_relato')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->dropColumn('status_breve_relato');
            $table->dropColumn('update_breve_relato');
        });
    }
}
