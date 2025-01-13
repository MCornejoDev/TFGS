<?php

namespace App\Http\Services;

use App\Models\Game;
use Exception;
use Illuminate\Support\Facades\Auth;

class GameService
{
    public static function getGames(string $search = '', array $filters = [], string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Game::query();

        $query->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('comments', 'like', '%' . $search . '%');
            });
        })->when($filters['date_start'] ?? null, function ($query) use ($filters) {
            $query->where('date_start', '>=', $filters['date_start']);
        });

        return $query->orderBy($sortField, $sortDirection)->paginate(10);
    }

    public static function getGameById(int $id): ?Game
    {
        return Game::findOrFail($id);
    }

    public static function create(array $data): ?Game
    {
        try {
            $game = Game::create($data);

            $game->users()->attach($data['users']);

            return $game;
        } catch (Exception $e) {
            log_error($e);

            return null;
        }
    }

    public static function remove(int $id): bool
    {
        try {
            return Game::findOrFail($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }
}
