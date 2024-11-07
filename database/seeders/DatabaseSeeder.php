<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProfilSeeder::class);
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'Admin@example.com',
            'password' => '12345678',
        ]);
    }
}
