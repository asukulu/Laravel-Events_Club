<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('organiser')->nullable();
            $table->text('description')->nullable();
            $table->integer('price');
            $table->string('venue');
            $table->date('date');
            $table->time('time');
            $table->string('image')->nullable();

            $table->unsignedBigInteger('user_id')->default(2)->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
