<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_registers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade'); 

            $table->text('description')->nullable();
            $table->enum('type', array_keys(\App\Models\CallRegister::TYPE))->default('normal');
            $table->enum('step', array_keys(\App\Models\CallRegister::STEP))->default('call');

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
        Schema::dropIfExists('call_registers');
    }
}
