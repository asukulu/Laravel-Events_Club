<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 7a453576495fb2612f5a66caee7e7befe9f4c26d

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            [
<<<<<<< HEAD
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

=======
                'title' => 'University Sports Day',
                'name' => 'Sports Day',
                'slug' => 'university-sports-day',
                'organiser' => 'Student Union',
                'description' => 'A day full of sports activities and competitions.',
                'price' => 0,
                'venue' => 'Main Campus Field',
                'date' => '2024-06-15',
                'time' => '09:00:00',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Annual Football Match',
                'name' => 'Sport/Football Match',
                'slug' => 'annual-football-match',
                'organiser' => 'Sports Club',
                'description' => 'Annual football match between different departments.',
                'price' => 5,
                'venue' => 'University Stadium',
                'date' => '2024-07-20',
                'time' => '16:00:00',
                'image' => '/img/1 (6).jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cultural Fest',
                'name' => 'Culture Fest',
                'slug' => 'cultural-fest',
                'organiser' => 'Cultural Committee',
                'description' => 'Experience the diverse cultures of our university.',
                'price' => 10,
                'venue' => 'Main Auditorium',
                'date' => '2024-08-05',
                'time' => '10:00:00',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Art Exhibition',
                'name' => 'Culture/Art Exhibition',
                'slug' => 'art-exhibition',
                'organiser' => 'Arts Club',
                'description' => 'Display of artworks by students and faculty.',
                'price' => 0,
                'venue' => 'Art Gallery',
                'date' => '2024-09-10',
                'time' => '11:00:00',
                'image' => '/img/2 (3).jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Music Concert',
                'name' => 'Others/ Concert',
                'slug' => 'music-concert',
                'organiser' => 'Music Club',
                'description' => 'Live performance by the university band.',
                'price' => 15,
                'venue' => 'Open Grounds',
                'date' => '2024-10-05',
                'time' => '18:00:00',
                'image' => '/img/2.jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dance Competition',
                'name' => 'Others/ Competition',
                'slug' => 'dance-competition',
                'organiser' => 'Dance Club',
                'description' => 'Inter-departmental dance competition.',
                'price' => 5,
                'venue' => 'Main Auditorium',
                'date' => '2024-11-12',
                'time' => '14:00:00',
                'image' => '/img/2 (7).jpg',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
>>>>>>> 7a453576495fb2612f5a66caee7e7befe9f4c26d
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
<<<<<<< HEAD
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            

            
            // Add more events as needed...
=======
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Charity Marathon',
                'name' => 'Sport/ Marathon',
                'slug' => 'charity-marathon',
                'organiser' => 'Charity Club',
                'description' => 'Run for a cause and raise funds for charity.',
                'price' => 20,
                'venue' => 'City Park',
                'date' => '2024-12-20',
                'time' => '07:00:00',
                'image' => '/img/1 (11).jpg',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tech Symposium',
                'name' => 'Others/ Symposium',
                'slug' => 'tech-symposium',
                'organiser' => 'Tech Club',
                'description' => 'Symposium on the latest advancements in technology.',
                'price' => 25,
                'venue' => 'Conference Hall',
                'date' => '2024-12-25',
                'time' => '09:00:00',
                'image' => '/img/2 (8).jpg',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Literary Meet',
                'name' => 'Others/ Meet',
                'slug' => 'literary-meet',
                'organiser' => 'Literary Club',
                'description' => 'Meet and interact with authors and poets.',
                'price' => 0,
                'venue' => 'Library',
                'date' => '2024-12-30',
                'time' => '11:00:00',
                'image' => '/img/2 (9).jpg',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
>>>>>>> 7a453576495fb2612f5a66caee7e7befe9f4c26d
        ]);
    }
}
