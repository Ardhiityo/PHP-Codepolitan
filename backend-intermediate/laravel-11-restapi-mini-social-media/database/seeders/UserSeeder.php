<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'test',
            'email' => 'test@test',
            'password' => 'rahasia'
        ]);

        User::create([
            'fullname' => 'testing',
            'email' => 'testing@testing',
            'password' => 'rahasia'
        ]);
    }
}
