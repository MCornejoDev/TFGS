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
        $userAdminId = User::where('is_admin', true)->first()->id;
        $games = Game::all();
        $userGames = [];

        foreach ($games as $game) {
            $userGames[] = [
                'user_id' => $userAdminId,
                'game_id' => $game->id,
            ];

            $userGames[] = [
                'user_id' => User::inRandomOrder()
                    ->where('is_admin', false)
                    ->first()
                    ->id,
                'game_id' => $game->id,
            ];
        }

        DB::table('users_games')->insert($userGames);
    }
}
