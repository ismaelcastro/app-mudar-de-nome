<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');

            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_categories');
    }
}
