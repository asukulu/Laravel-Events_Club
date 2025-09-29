<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to safely clear the table
        Schema::disableForeignKeyConstraints();
        DB::table('events')->truncate();
        Schema::enableForeignKeyConstraints();

        $events = [
            // ==================== SPORTS EVENTS ====================
            [
                'title' => 'University Sports Day',
                'name' => 'sport',
                'slug' => 'university-sports-day',
                'organiser' => 'Student Union',
                'description' => 'A day full of sports activities and competitions for all students.',
                'price' => 0,
                'venue' => 'Main Campus Field',
                'date' => '2024-06-15',
                'time' => '09:00:00',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1
            ],
            [
                'title' => 'Annual Football Match',
                'name' => 'sport', 
                'slug' => 'annual-football-match',
                'organiser' => 'Sports Club',
                'description' => 'Annual football match between different university departments.',
                'price' => 5,
                'venue' => 'University Stadium',
                'date' => '2024-07-20',
                'time' => '16:00:00',
                'image' => '/img/1 (6).jpg',
                'user_id' => 1
            ],
            [
                'title' => 'Basketball Tournament Finals',
                'name' => 'sport',
                'slug' => 'basketball-tournament-finals',
                'organiser' => 'Sports Department',
                'description' => 'Championship finals of the inter-department basketball tournament.',
                'price' => 3,
                'venue' => 'University Gymnasium',
                'date' => '2024-08-12',
                'time' => '14:00:00',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1
            ],

            // ==================== CULTURE EVENTS ====================
            [
                'title' => 'Cultural Festival',
                'name' => 'culture',
                'slug' => 'cultural-festival',
                'organiser' => 'Cultural Committee',
                'description' => 'Experience the diverse cultures of our university through music, dance, and food.',
                'price' => 10,
                'venue' => 'Main Auditorium',
                'date' => '2024-08-05',
                'time' => '10:00:00',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],
            [
                'title' => 'Art Exhibition Opening',
                'name' => 'culture',
                'slug' => 'art-exhibition-opening',
                'organiser' => 'Art Department',
                'description' => 'Opening night of the annual student art exhibition featuring various mediums.',
                'price' => 8,
                'venue' => 'University Gallery',
                'date' => '2024-09-15',
                'time' => '18:00:00',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],
            [
                'title' => 'Music Concert: Jazz Night',
                'name' => 'culture',
                'slug' => 'jazz-night-concert',
                'organiser' => 'Music Society',
                'description' => 'An evening of live jazz performances by student and professional musicians.',
                'price' => 12,
                'venue' => 'Performance Hall',
                'date' => '2024-10-20',
                'time' => '19:30:00',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ],

            // ==================== OTHER EVENTS ====================
            [
                'title' => 'Career Fair 2024',
                'name' => 'others',
                'slug' => 'career-fair-2024',
                'organiser' => 'Career Services',
                'description' => 'Connect with top employers and explore career opportunities.',
                'price' => 0,
                'venue' => 'Student Center',
                'date' => '2024-09-01',
                'time' => '10:00:00',
                'image' => '/img/1 (8).jpg',
                'user_id' => 1
            ],
            [
                'title' => 'Tech Conference: Future Innovations',
                'name' => 'others',
                'slug' => 'tech-conference-future',
                'organiser' => 'Computer Science Department',
                'description' => 'Annual technology conference featuring industry leaders and workshops.',
                'price' => 15,
                'venue' => 'Conference Center',
                'date' => '2024-11-08',
                'time' => '09:00:00',
                'image' => '/img/1 (6).jpg',
                'user_id' => 1
            ],
            [
                'title' => 'Charity Fundraiser Gala',
                'name' => 'others',
                'slug' => 'charity-fundraiser-gala',
                'organiser' => 'Student Volunteer Group',
                'description' => 'Elegant evening gala to raise funds for local community projects.',
                'price' => 25,
                'venue' => 'Grand Ballroom',
                'date' => '2024-12-05',
                'time' => '19:00:00',
                'image' => '/img/2 (6).jpg',
                'user_id' => 2
            ]
        ];

        // Add timestamps and insert data
        $events = array_map(function ($event) {
            return array_merge($event, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }, $events);

        DB::table('events')->insert($events);
    }
}