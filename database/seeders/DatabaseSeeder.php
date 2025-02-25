<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run the UsersTableSeeder first
        $this->call(UsersTableSeeder::class);
        
        // Then run the EventsTableSeeder
        $this->call(EventsTableSeeder::class);
        
        // Other seeders...
    }
}