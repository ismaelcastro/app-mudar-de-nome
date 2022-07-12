<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('call_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls')->onDelete('cascade');

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->enum('type', ['claimant','descendant','spouse'])->nullable();   //requerente,descebdebte,conjugê

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
        Schema::dropIfExists('affiliations');
    }
}
