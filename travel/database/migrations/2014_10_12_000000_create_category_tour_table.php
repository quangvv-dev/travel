<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// @codingStandardsIgnoreLine
class CreateCategoryTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->string('background')->nullable();
            $table->string('slogan_en')->nullable();
            $table->string('slogan_vi')->nullable();
            $table->string('slogan_th')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('name_th')->nullable();
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
        Schema::dropIfExists('category_tour');
    }
}
