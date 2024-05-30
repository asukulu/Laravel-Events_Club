<?php
use App\Models\Event;
//namespace Database\Seeders;



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       $this->call(CategoriesTableSeeder::class);
        $this->call(EventSeeder::class); 
    }
}
          
        
    

