<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Reset table
        DB::table('users')->delete();


        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => '2222222223@aston.ac.uk',
                'password' => Hash::make('password123'),
                'tel' => '1234567890', // unique
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Second Admin',
                'email' => '2222222221@aston.ac.uk',
                'password' => Hash::make('password123'),
                'tel' => '0987654321', // different number
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
