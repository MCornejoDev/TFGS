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
        $games = Game::all();
        $userGames = [];
        $userGames2 = [];

        foreach ($games as $game) {
            $userGames[] = [
                'user_id' => $userId,
                'game_id' => $game->id,
            ];
            $userGames2[] = [
                'user_id' => User::inRandomOrder()
                    ->where('name', '!=', 'Test User')
                    ->first()
                    ->id,
                'game_id' => $game->id,
            ];
        }
        DB::table('users_games')->insert($userGames);
        DB::table('users_games')->insert($userGames2);
    }
}
