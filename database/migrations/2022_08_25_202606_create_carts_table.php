<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('client_id')->unsigned()->nullable()->default(null);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->bigInteger('coupon_id')->unsigned()->nullable()->default(null);
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');

            $table->string('status')->default('open');
            $table->string('zipcode')->nullable();
            $table->string('ip')->nullable();
            $table->string('delivery_method')->nullable();
            $table->double('delivery_amount', 12, 2)->nullable();
            $table->integer('delivery_time')->nullable();
            $table->string('payment_method')->nullable();
            $table->longText('payment_details')->nullable();
            $table->string('tracking_code')->nullable();
            $table->double('discount_price', 12, 2)->nullable();
            $table->double('total', 12, 2)->nullable();

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
        Schema::dropIfExists('carts');
    }
}
