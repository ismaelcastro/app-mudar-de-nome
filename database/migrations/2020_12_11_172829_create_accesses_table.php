<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');

            $table->string('code')->nullable()->unique();
            $table->dateTime('finish')->nullable();

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
        Schema::dropIfExists('accesses');
    }
}
