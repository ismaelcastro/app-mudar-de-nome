<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_guides', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade'); 

            $table->bigInteger('guide_id')->unsigned();
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');

            $table->enum('status', array_keys(\App\Models\CallGuide::STATUS))->default('new');
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
        Schema::dropIfExists('call_guides');
    }
}
