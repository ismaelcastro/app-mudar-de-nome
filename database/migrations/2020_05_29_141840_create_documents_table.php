<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('document_category_id')->unsigned();
            $table->foreign('document_category_id')->references('id')->on('document_categories')->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['simple', 'word', 'pdf'])->default('simple');
            $table->string('file')->nullable();
            $table->longText('description')->nullable();
            $table->text('info')->nullable();
            $table->decimal('price', 9, 3);
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
        Schema::dropIfExists('documents');
    }
}
