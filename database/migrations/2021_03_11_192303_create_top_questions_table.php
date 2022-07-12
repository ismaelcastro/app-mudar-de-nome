<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('question');
            $table->text('answer');
            $table->integer('order')->default(1);
            $table->unsignedBigInteger('top_question_category_id');
            $table->foreign('top_question_category_id')->references('id')->on('top_question_categories')->onDelete('cascade');
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
        Schema::dropIfExists('top_questions');
    }
}
