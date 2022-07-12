<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('slug');
            $table->string('metaurl')->nullable();
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
        Schema::dropIfExists('faq_categories');
    }
}
