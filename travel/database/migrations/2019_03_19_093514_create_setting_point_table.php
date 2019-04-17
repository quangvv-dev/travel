<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class CreateSettingPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_point', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('introduce_friend')->default(1000);
            $table->integer('share_location')->default(10);
            $table->integer('share_tour')->default(10);
            $table->integer('rating_tour')->default(10);
            $table->integer('rating_location')->default(10);
            $table->integer('discount_order')->default(1000);
            $table->integer('point_default')->default(0);
            $table->integer('redemption_point_vi')->default(0);
            $table->integer('redemption_point_en')->default(0);
            $table->integer('redemption_point_th')->default(0);
            $table->double('ratting_app')->default(5);
            $table->bigInteger('exchange_en')->default(0);
            $table->bigInteger('exchange_th')->default(0);
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
        Schema::dropIfExists('setting_point');
    }
}
