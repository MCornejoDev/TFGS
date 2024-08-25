<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::where('name', 'Test User')->first()->id;
        DB::table('users_games')->insert([
            'user_id' => $userId,
            'game_id' => Game::inRandomOrder()->first()->id,
        ]);
    }
}
