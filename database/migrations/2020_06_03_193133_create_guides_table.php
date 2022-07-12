<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('guide_category_id')->unsigned();
            $table->foreign('guide_category_id')->references('id')->on('guide_categories')->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['simple', 'word', 'pdf'])->default('simple');
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->string('info')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('guides');
    }
}
