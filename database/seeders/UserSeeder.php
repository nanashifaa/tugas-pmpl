<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'Nashifa',
            'email'=>'nashifa@example.com',
            'password'=>bcrypt('password123'),
            'role'=>'dosen'
        ]);
    }
}