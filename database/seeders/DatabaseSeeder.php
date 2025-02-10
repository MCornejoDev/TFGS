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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true,
            'email_verified_at' => now(),
            'timezone' => 'Europe/Madrid',
        ]);

        $this->call([
            CharacterTypeSeeder::class,
            GameSeeder::class,
            CharacterSeeder::class,
            UserGameSeeder::class,
            //CharacterHistorySeeder::class,
            MapSeeder::class,
        ]);
    }
}
