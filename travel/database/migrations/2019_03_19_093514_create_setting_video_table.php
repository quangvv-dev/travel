<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class CreateSettingVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('video_link');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('order')->default(0);
            $table->integer('point')->default(20);
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
