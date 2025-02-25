<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin User',
            'email' => '2626262626@aston.ac.uk',
            'password' => Hash::make('password123'), // Hash the password correctly
            'tel' => '1234567890', // Ensure 'tel' is correctly assigned
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
