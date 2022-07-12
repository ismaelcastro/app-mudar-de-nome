<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('resume');
            $table->text('description');
            $table->string('color');
            $table->unsignedBigInteger('process_type_id');
            $table->foreign('process_type_id')->references('id')->on('process_types')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_categories');
    }
}
