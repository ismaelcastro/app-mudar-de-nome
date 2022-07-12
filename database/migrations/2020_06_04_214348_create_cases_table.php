<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('image')->nullable();
            $table->string('imagehover')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->text('websites')->nullable();
            $table->string('slug')->nullable();
            $table->string('metatitle')->nullable();
            $table->text('metadescription')->nullable();

            $table->string('caseaction')->nullable();

            $table->bigInteger('changetype_id')->unsigned()->nullable()->default(null);
            $table->foreign('changetype_id')->references('id')->on('changetypes')->onDelete('set null');

            $table->bigInteger('reason_id')->unsigned()->nullable()->default(null);
            $table->foreign('reason_id')->references('id')->on('reasons')->onDelete('set null');

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
        Schema::dropIfExists('cases');
    }
}
