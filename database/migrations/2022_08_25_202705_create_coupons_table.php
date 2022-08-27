<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->boolean('status')->default(1);
            $table->string('coupon_type')->nullable()->default('currency');
            $table->double('amount', 12, 2)->nullable();
            $table->integer('percentage')->nullable();
            $table->date('start')->nullable();
            $table->date('finish')->nullable();
            $table->double('min', 12, 2)->nullable();
            $table->double('max', 12, 2)->nullable();
            $table->boolean('single')->nullable()->default(0);

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
        Schema::dropIfExists('coupons');
    }
}
