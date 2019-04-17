<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreLine
class CreateTourLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en')->nullable();
            $table->string('name_vi');
            $table->string('name_th')->nullable();
            $table->string('slogan_en')->nullable();
            $table->string('slogan_vi')->nullable();
            $table->string('slogan_th')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_th')->nullable();
            $table->text('lat_long');
            $table->string('time_zone');
            $table->text('best_time_en')->nullable();
            $table->text('best_time_vi')->nullable();
            $table->text('best_time_th')->nullable();
            $table->integer('currency_id');
            $table->integer('city_id');
            $table->float('avg_star_rating')->nullable();
            $table->string('image')->nullable();
            $table->string('address');
            $table->boolean('highlights')->nullable();
            $table->integer('view');
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
        Schema::dropIfExists('tour_locations');
    }
}
