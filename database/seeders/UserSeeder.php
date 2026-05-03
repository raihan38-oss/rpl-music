<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'Admin',
            'profile_pict' => ''
        ]);
        User::create([
            'name' => 'Sunghoon',
            'email' => 'sunghoon@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'Artist',
            'profile_pict' => ''
        ]);
        User::create([
            'name' => 'Raihan',
            'email' => 'raihan1000jitu@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'User',
            'profile_pict' => ''
        ]);
       
    }
}
