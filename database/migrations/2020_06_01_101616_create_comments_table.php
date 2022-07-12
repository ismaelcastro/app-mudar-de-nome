<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 

            $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade'); 

            $table->string('title');
            $table->text('body_mail')->nullable();
            $table->text('body_sms')->nullable();
            $table->text('body_zap')->nullable();
            $table->text('body_database')->nullable();

            $table->datetime('mail_read')->nullable();
            $table->datetime('sms_read')->nullable();
            $table->datetime('zap_read')->nullable();
            $table->datetime('database_read')->nullable();

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
        Schema::dropIfExists('comments');
    }
}
