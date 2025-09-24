<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->truncate(); // Optional: clear table before seeding (for development)

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
                'title' => 'Others',
                'name' => 'Others',
                'slug' => 'cultural-fest',
                'organiser' => 'Cultural Committee',
                'description' => 'Experience the diverse cultures of our university.',
                'price' => 10,
                'venue' => 'Main Auditorium',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-09-01',
                'time' => '11:00:00',
                'title' => 'Others',
                'name' => 'Others',
                'slug' => 'university-sports-day-2',
                'organiser' => 'Student Union',
                'description' => 'Another day full of sports activities and competitions.',
                'price' => 0,
                'venue' => 'Main Campus Field',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-10-10',
                'time' => '17:00:00',
                'title' => 'Annual Football Match (2)',
                'name' => 'Sport/Football Match',
                'slug' => 'annual-football-match-2',
                'organiser' => 'Sports Club',
                'description' => 'Second annual football match between different departments.',
                'price' => 5,
                'venue' => 'University Stadium',
                'image' => '/img/1 (6).jpg',
                'user_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'date' => '2024-11-15',
                'time' => '12:00:00',
                'title' => 'Cultural Fest (2)',
                'name' => 'Culture Fest',
                'slug' => 'cultural-fest-2',
                'organiser' => 'Cultural Committee',
                'description' => 'Another cultural fest event.',
                'price' => 10,
                'venue' => 'Main Auditorium',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],
            // Add more events here, each with a unique slug
        ]);
    }
}