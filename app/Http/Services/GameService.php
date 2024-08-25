<?php

namespace App\Http\Services;

use App\Models\Game;
use Exception;
use Illuminate\Support\Facades\Auth;

class GameService
{
    public static function getGames(string $search = "", array $filters = [])
    {
        $query = Game::query();

        $query->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        });

        return $query->orderBy('id', 'desc')->paginate(8);
    }
}
