<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreLine
class CreateTourBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sum_price');
            $table->boolean('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('country_id');
            $table->string('phone_number');
            $table->string('email');
            $table->integer('user_id');
            $table->date('time_start');
            $table->text('note');
            $table->tinyInteger('payments');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('tour_bookings');
    }
}
