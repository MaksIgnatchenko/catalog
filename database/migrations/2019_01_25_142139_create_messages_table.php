<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('senderable_id')->nullable();
            $table->string('senderable_type')->nullable();
            $table->unsignedInteger('recipientable_id')->nullable();
            $table->string('recipientable_type')->nullable();
            $table->string('purpose');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->dateTime('referred_time')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('messages');
    }
}