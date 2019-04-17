<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class CreateTourVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->text('content')->nullable();
            $table->integer('money_promotion_vi');
            $table->integer('money_promotion_en')->nullable();
            $table->integer('money_promotion_th')->nullable();
            $table->integer('percent_promotion')->nullable();
            $table->date('time_start');
            $table->date('time_end');
            $table->bigInteger('min_price')->default(0);
            $table->bigInteger('max_discount');
            $table->bigInteger('min_limit_discount');
            $table->integer('uses_quantity')->default(0);
            $table->integer('current_quantity');
            $table->integer('person_quantity')->nullable();
            $table->integer('person_rank')->nullable();
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
        Schema::dropIfExists('tour_vouchers');
    }
}
