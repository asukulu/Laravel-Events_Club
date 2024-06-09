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
        // Only call existing seeders here
        $this->call([
           //UsersTableSeeder::class,
            EventsTableSeeder::class,
            // Add other existing seeders here if needed

            
        ]);
    }
}

