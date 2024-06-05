<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Developer',
            'username' => 'developer',
            'email' => 'dev@example.org',
            'password' => Hash::make('password'),
        ]);
        //make 20 dummy users
        User::factory()->count(35)->create();
    }
}
