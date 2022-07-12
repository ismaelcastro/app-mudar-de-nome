<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_extras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');
            
            $table->bigInteger('extra_category_id')->unsigned()->nullable()->default(null);
            $table->foreign('extra_category_id')->references('id')->on('extra_categories')->onDelete('cascade');

            $table->bigInteger('document_id')->unsigned();
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');

            $table->enum('status', array_keys(\App\Models\CallExtra::STATUS))->default('new');
            $table->string('name'); 
            $table->string('reason')->nullable();
            $table->string('file')->nullable();

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
        Schema::dropIfExists('call_extras');
    }
}
