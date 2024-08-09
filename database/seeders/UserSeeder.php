<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'user1@example.com',
                'password' => Hash::make('password1'),
            ],
            [
                'email' => 'user2@example.com',
                'password' => Hash::make('password2'),
            ],
            [
                'email' => 'user3@example.com',
                'password' => Hash::make('password3'),
            ],
        ]);
    }
}
