<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Agostino',
            'email' => 'user@example.com',
            'password' => 'Password',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Giovanni',
            'email' => 'user2@example.com',
            'password' => 'Password',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Mario',
            'email' => 'user3@example.com',
            'password' => 'Password',
        ]);
    }
}
