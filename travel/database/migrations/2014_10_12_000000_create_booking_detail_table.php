<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreLine
class CreateBookingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('tour_package_id');
            $table->string('voucher');
            $table->integer('discount');
            $table->integer('member_level');
            $table->integer('quantity_adults');
            $table->integer('price_adults');
            $table->integer('quantity_children');
            $table->integer('price_children');
            $table->integer('quantity_disabilities');
            $table->integer('price_disabilities');

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
        Schema::dropIfExists('booking_detail');
    }
}
