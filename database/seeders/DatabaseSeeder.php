<?php
<<<<<<< HEAD

=======
>>>>>>> 7a453576495fb2612f5a66caee7e7befe9f4c26d
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
<<<<<<< HEAD
        // Run the UsersTableSeeder first
        $this->call(UsersTableSeeder::class);
        
        // Then run the EventsTableSeeder
        $this->call(EventsTableSeeder::class);
        
        // Other seeders...
    }
}
=======
        // Only call existing seeders here
        $this->call([
           //UsersTableSeeder::class,
            EventsTableSeeder::class,
            // Add other existing seeders here if needed

            
        ]);
    }
}

>>>>>>> 7a453576495fb2612f5a66caee7e7befe9f4c26d
