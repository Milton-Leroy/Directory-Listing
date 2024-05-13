<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 'admin',
            ],

            [
                'name' => 'John Doe',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('123456'),
                'user_type' => 'user',
            ],
        ]);
    }
}
