<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('slug')->unique();
            $table->string('organiser');
            $table->text('description');
            $table->integer('price');
            $table->string('venue');
            $table->date('date');
            $table->time('time');
            $table->string('image');
            $table->unsignedBigInteger('user_id')->default(2)->index();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Insert initial data
        DB::table('events')->insert([
            [
                'title' => 'University Sports Day',
                'name' => 'Sports Day',
                'slug' => 'university-sports-day',
                'organiser' => 'Student Union',
                'description' => 'A day full of sports activities and competitions.',
                'price' => 0,
                'venue' => 'Main Campus Field',
                'date' => '2024-06-15',
                'time' => '09:00:00',
                'image' => '/img/sports_day.jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries if needed
        ]);
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
