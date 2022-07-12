<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Call;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('changetype_id')->unsigned();
            $table->foreign('changetype_id')->references('id')->on('changetypes')->onDelete('cascade');

            $table->bigInteger('reason_id')->unsigned();
            $table->foreign('reason_id')->references('id')->on('reasons')->onDelete('cascade');
            
            $table->string('title');
            $table->string('caseaction');
            $table->string('currentname');
            $table->string('querent');
            $table->string('desiredname');
            $table->text('description')->nullable();
            $table->enum('status', array_keys(Call::STATUS))->default('novo');
            $table->enum('paymentform', array_keys(Call::PAYMENTFORM))->nullable();
            $table->enum('stage_call', array_keys(Call::STAGE_CALL))->nullable();
            $table->enum('stage_case', array_keys(Call::STAGE_CASE))->nullable();
            $table->enum('procedural_step', array_keys(Call::PROCEDURAL_STEP))->nullable();
            $table->enum('procedural_status', array_keys(Call::PROCEDURAL_STATUS))->nullable();
            $table->enum('interest', array_keys(Call::INTEREST))->nullable();
            $table->enum('guides_type', array_keys(Call::GUIDES_TYPE))->nullable();
            $table->dateTime('date_procedural_status')->nullable();
            $table->integer('installments')->nullable();
            $table->integer('max_installments')->nullable();
            $table->date('paydate')->nullable();
            $table->dateTime('casedate')->nullable();
            $table->dateTime('process')->nullable();   
            $table->dateTime('signed')->nullable();         
            $table->integer('stars')->nullable();
            $table->string('source')->nullable();

            $table->string('process_number')->nullable();
            $table->string('judgment_number')->nullable();
            $table->string('judgment_stick')->nullable();
            $table->string('court_jurisdiction')->nullable();
            $table->string('link_in_court')->nullable();
            $table->string('protocol')->nullable();
            $table->date('distributed_in')->nullable();
            $table->boolean('forwardingagent')->nullable();
            $table->string('certificate')->nullable();

            $table->string('title_doc_extra')->nullable();

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
        Schema::dropIfExists('calls');
    }
}
