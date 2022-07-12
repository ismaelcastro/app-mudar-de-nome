<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsRelationshipToCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->boolean('is_claimant')->nullable();             //se é requerente
            $table->string('relationship_claimant')->nullable();    //tipo de relação com o requerente
            $table->integer('descendants_quantity')->nullable();    //quantidade de descendentes
            $table->text('breve_relato')->nullable();
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
            $table->dropColumn('breve_relato');
            $table->dropColumn('descendants_quantity');
            $table->dropColumn('relationship_claimant');
            $table->dropColumn('is_claimant');
        });
    }
}
