<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatchers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('document_category_id')->unsigned();
            $table->foreign('document_category_id')->references('id')->on('document_categories')->onDelete('cascade');

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');

            $table->double('amount', 12, 2)->nullable();

            $table->string('proof_of_payment')->nullable();

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
        Schema::dropIfExists('dispatchers');
    }
}
