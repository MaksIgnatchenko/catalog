<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adblocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('position');
            $table->string('type');
            $table->dateTime('appear_start');
            $table->dateTime('appear_finish');
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
        Schema::dropIfExists('adblocks');
    }
}
