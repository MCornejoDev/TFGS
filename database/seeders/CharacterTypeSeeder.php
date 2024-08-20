<?php

namespace Database\Seeders;

use App\Models\CharacterType;
use Illuminate\Database\Seeder;

class CharacterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CharacterType::factory()->count(10)->create();
    }
}
