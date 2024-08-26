<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Character::factory()->count(10)->create();

        $userId = User::where('name', 'Test User')->first()->id;
        Character::factory()->count(10)->create([
            'user_id' => $userId,
        ]);
    }
}
