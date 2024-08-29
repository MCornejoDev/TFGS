<?php

namespace App\Http\Services;

use App\Models\Game;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GameService
{
    public static function getGames(string $search = "", array $filters = [], string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Game::query();

        $query->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('comments', 'like', '%' . $search . '%');
            });
        });

        return $query->orderBy($sortField, $sortDirection)->paginate(10);
    }

    public static function remove(int $id): bool
    {
        try {
            return Game::find($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }
}
