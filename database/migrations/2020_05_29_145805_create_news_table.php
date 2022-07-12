<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_category_id')->unsigned();
            $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->date('date');
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('websites')->nullable();
            $table->string('slug')->nullable();
            $table->string('metatitle')->nullable();
            $table->text('metadescription')->nullable();
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
        Schema::dropIfExists('news');
    }
}
