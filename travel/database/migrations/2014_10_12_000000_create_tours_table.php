<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('package_day')->nullable();
            $table->string('tour_name_en')->nullable();
            $table->string('tour_name_vi')->nullable();
            $table->string('tour_name_th')->nullable();
            $table->string('video_id')->nullable();
            $table->integer('default_package');
            $table->integer('accept')->nullable()->default(0);
            $table->boolean('hot')->default(0);
            $table->string('booked_number')->default(0);
            $table->integer('cancel_time')->default(0);
            $table->text('tour_description_en')->nullable();
            $table->text('tour_description_vi')->nullable();
            $table->text('tour_description_th')->nullable();
            $table->text('experience_content_en')->nullable();
            $table->text('experience_content_vi')->nullable();
            $table->text('experience_content_th')->nullable();
            $table->text('tour_services_en')->nullable();
            $table->text('tour_services_vi')->nullable();
            $table->text('tour_services_th')->nullable();
            $table->text('additional_info_en')->nullable();
            $table->text('additional_info_vi')->nullable();
            $table->text('additional_info_th')->nullable();
            $table->text('additional_info_2_en')->nullable();
            $table->text('additional_info_2_vi')->nullable();
            $table->text('additional_info_2_th')->nullable();
            $table->text('tour_guide_en')->nullable();
            $table->text('tour_guide_vi')->nullable();
            $table->text('tour_guide_th')->nullable();
            $table->text('faq')->nullable();
            $table->text('cancel_policy')->nullable();
            $table->string('lat_long_place');
            $table->integer('tour_location_id');
            $table->string('address');
            $table->float('avg_star_rating')->default(5);
            $table->string('images')->nullable();
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('tours');
    }
}
