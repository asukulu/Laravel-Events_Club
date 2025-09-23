<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-06-15',
                'time' => '09:00:00',
                'title' => 'University Sports Day',
                'name' => 'Sports Day',
                'slug' => 'university-sports-day',
                'organiser' => 'Student Union',
                'description' => 'A day full of sports activities and competitions.',
                'price' => 0,
                'venue' => 'Main Campus Field',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-07-20',
                'time' => '16:00:00',
                'title' => 'Annual Football Match',
                'name' => 'Sport/Football Match',
                'slug' => 'annual-football-match',
                'organiser' => 'Sports Club',
                'description' => 'Annual football match between different departments.',
                'price' => 5,
                'venue' => 'University Stadium',
                'image' => '/img/1 (6).jpg',
                'user_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-08-05',
                'time' => '10:00:00',
                'title' => 'Cultural Fest',
                'name' => 'Culture Fest',
                'slug' => 'cultural-fest',
                'organiser' => 'Cultural Committee',
                'description' => 'Experience the diverse cultures of our university.',
                'price' => 10,
                'venue' => 'Main Auditorium',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],
            // Add more events here, each as a **separate array**, properly closed
        ]);
    }
}
