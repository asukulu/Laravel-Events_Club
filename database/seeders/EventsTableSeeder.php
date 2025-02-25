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
                'date' => '2024-06-15',
                'description' => 'A day full of sports activities and competitions.',
                'image' => '/img/1 (8).jpg',
                'name' => 'Sports Day',
                'organiser' => 'Student Union',
                'price' => 0,
                'slug' => 'university-sports-day',
                'time' => '09:00:00',
                'title' => 'University Sports Day',
                'updated_at' => now(),
                'user_id' => 1, // Ensure this ID exists in users table
                'venue' => 'Main Campus Field',
            ],
            // Add other events with valid user IDs...
            [
                'created_at' => now(),
                'date' => '2024-07-20',
                'description' => 'Annual football match between different departments.',
                'image' => '/img/1 (6).jpg',
                'name' => 'Sport/Football Match',
                'organiser' => 'Sports Club',
                'price' => 5,
                'slug' => 'annual-football-match',
                'time' => '16:00:00',
                'title' => 'Annual Football Match',
                'updated_at' => now(),
                'user_id' => 1, // Ensure this ID exists in users table
                'venue' => 'University Stadium',
            ],

            [
                'created_at' => now(),
                'date' => '2024-07-20',
                'description' => 'Annual football match between different departments.',
                'image' => '/img/1 (10).jpg',
                'name' => 'Sport/Football Match',
                'organiser' => 'Sports Club',
                'price' => 5,
                'slug' => 'annual',
                'time' => '16:00:00',
                'title' => 'Annual',
                'updated_at' => now(),
                'user_id' => 1, // Ensure this ID exists in users table
                'venue' => 'University Stadium',
            ],

            
            [
                'created_at' => now(),
                'date' => '2024-07-20',
                'description' => 'Annual football match between different departments.',
                'image' => '/img/1 (7).jpg',
                'name' => 'Sport/Football Match',
                'organiser' => 'Sports Club',
                'price' => 5,
                'slug' => 'Culture',
                'time' => '16:00:00',
                'title' => 'Culture',
                'updated_at' => now(),
                'user_id' => 1, // Ensure this ID exists in users table
                'venue' => 'University Stadium',
            ],

            [
                'title' => 'Science Fair',
                'name' => 'Others/Science Fair',
                'slug' => 'science-fair',
                'organiser' => 'Science Club',
                'description' => 'Exhibition of scientific projects and experiments.',
                'price' => 0,
                'venue' => 'Science Block',
                'date' => '2024-12-01',
                'time' => '10:00:00',
                'image' => '/img/2 (3).jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            

            
            // Add more events as needed...
        ]);
    }
}
