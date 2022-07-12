<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('task_list_id')->unsigned();
            $table->foreign('task_list_id')->references('id')->on('task_lists')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');

            $table->text('description')->nullable();
            $table->dateTime('date');
            $table->string('users');
            $table->text('address')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('status', array_keys(\App\Models\Task::STATUS))->default('open');
            $table->enum('priority', array_keys(\App\Models\Task::PRIORITY))->default('low');

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
        Schema::dropIfExists('tasks');
    }
}
