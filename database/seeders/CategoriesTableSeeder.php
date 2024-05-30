<?php

use App\Models\Category;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
  {
    DB::table('categories')->insert([
      'title' => Str::random(10),
       'description' => Str::random(10),
        'venue' =>Str::random(10),
   ]);
 }
}


    {
        Category::create([
'title' => 'Sports',
'slug' => 'sports'

        ]);


        Category::create([
            'title' => 'Cultures',
            'slug' => 'cultures'
            
            ]);

            Category::create([
                'title' => 'sports',
                'slug' => 'sports'
                
                ]);

         Category::create([
        'title' => 'Others',
        'slug' => 'others'
                        
         ]);
         }
                       
    
