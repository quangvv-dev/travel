<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreLine
class CreateTourPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_package', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('name_th')->nullable();
            $table->bigInteger('price_adult')->default(0);
            $table->bigInteger('price_child')->default(0);
            $table->bigInteger('price_disabiliti')->default(0);
            $table->bigInteger('price_adult_promotion')->default(0);
            $table->bigInteger('price_child_promotion')->default(0);
            $table->bigInteger('price_disabiliti_promotion')->default(0);
            $table->bigInteger('price_adult_en')->default(0);
            $table->bigInteger('price_child_en')->default(0);
            $table->bigInteger('price_disabiliti_en')->default(0);
            $table->bigInteger('price_adult_promotion_en')->default(0);
            $table->bigInteger('price_child_promotion_en')->default(0);
            $table->bigInteger('price_disabiliti_promotion_en')->default(0);
            $table->bigInteger('price_adult_th')->default(0);
            $table->bigInteger('price_child_th')->default(0);
            $table->bigInteger('price_disabiliti_th')->default(0);
            $table->bigInteger('price_adult_promotion_th')->default(0);
            $table->bigInteger('price_child_promotion_th')->default(0);
            $table->bigInteger('price_disabiliti_promotion_th')->default(0);
            $table->string('time_start')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_vi')->nullable();
            $table->text('description_th')->nullable();
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
        Schema::dropIfExists('tour_package');
    }
}
