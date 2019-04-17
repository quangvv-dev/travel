<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// @codingStandardsIgnoreLine
class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('type');
            $table->integer('tag_id');
            $table->string('message_en')->nullable();
            $table->string('message_vi')->nullable();
            $table->string('message_th')->nullable();
            $table->date('time_start');
            $table->string('title_en')->nullable();
            $table->string('title_vi')->nullable();
            $table->string('title_th')->nullable();
            $table->text('data')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
