<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
    ['email' => 'nashifa@example.com'],
    [
        'name' => 'Nashifa',
        'password' => bcrypt('password123'),
        'role' => 'dosen'
    ]
);

User::firstOrCreate(
    ['email' => 'kepalalab@example.com'],
    [
        'name' => 'Kepala Lab',
        'password' => bcrypt('password123'),
        'role' => 'kepala_lab'
    ]
    );
    }
}