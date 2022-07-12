<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddD4signToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('token_d4sign')->nullable();
            $table->string('template_d4sign')->nullable();
            $table->string('uuid_cofre')->nullable();
            $table->string('uuid_pasta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {            
            $table->dropColumn('uuid_pasta');
            $table->dropColumn('uuid_cofre');
            $table->dropColumn('template_d4sign');
            $table->dropColumn('token_d4sign');
        });
    }
}
