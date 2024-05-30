<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
         
            $table->string('title');
            $table->string('name');
             
            $table->string('slug');
            $table->string('organiser');
            $table->text('description');
            $table->integer('price'); 
            $table->string('venue');      
            $table->date('date');
            $table->time('time');
            $table->string('image');
         
            $table->timestamps();
            $table->unsignedInteger('user_id')->index()->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
