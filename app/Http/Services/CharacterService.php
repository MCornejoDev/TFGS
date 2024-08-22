<?php

namespace App\Http\Services;

use App\Enums\CharacterTypes;
use App\Enums\Races;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;

class CharacterService
{
    public static function getCharacters(string $search = "", array $filters)
    {
        $query = Character::query();

        $query->where('user_id', Auth::id())
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('nickname', 'like', '%' . $search . '%');
                });
            })
            ->when($filters['race'], function ($query) use ($filters) {
                $query->where('race', $filters['race']);
            })
            ->when($filters['characterType'], function ($query) use ($filters) {
                $query->where('character_type_id', $filters['characterType']);
            })
            ->when(!is_null($filters['gender']), function ($query) use ($filters) {
                $query->where('gender', $filters['gender']);
            });

        return $query->orderBy('id', 'desc')->paginate(8);
    }
}
