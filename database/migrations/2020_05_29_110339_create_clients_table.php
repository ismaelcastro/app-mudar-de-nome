<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();

            $table->enum('email_type', array_keys(\App\Models\Client::TYPE_EMAIL))->nullable();
            $table->string('nickname')->nullable();            
            $table->string('job')->nullable();
            $table->string('treatment')->nullable();
            $table->string('fathersname')->nullable();
            $table->string('mothersname')->nullable();
            $table->string('nacionality')->nullable();
            $table->string('phone')->nullable();
            $table->string('operator')->nullable();
            $table->enum('type_enum', array_keys(\App\Models\Client::TYPE_ENUM))->nullable();
            $table->string('voterdocument')->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('rg')->nullable();
            $table->date('expeditiondate')->nullable();
            $table->string('ctps')->nullable();
            $table->string('cnh')->nullable();


            $table->date('date_birth')->nullable();
            $table->enum('marital_status', array_keys(\App\Models\Client::MARITAL_STATUS))->nullable();

            $table->enum('addresstype', array_keys(\App\Models\Client::ADDRESS_TYPE))->nullable();
            $table->string('addresscep', 10)->nullable();
            $table->string('addressstreet')->nullable();
            $table->string('addressnumber', 20)->nullable();
            $table->string('addressdistrict')->nullable();
            $table->string('addresscomplement')->nullable();
            $table->string('addresscity')->nullable();
            $table->string('addressstate', 2)->nullable();
            $table->text('note')->nullable();

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
        Schema::dropIfExists('clients');
    }
}
