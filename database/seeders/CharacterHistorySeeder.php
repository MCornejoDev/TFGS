<?php

namespace Database\Seeders;

use App\Models\CharacterHistory;
use Illuminate\Database\Seeder;

class CharacterHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CharacterHistory::factory()->count(10)->create();
    }
}
