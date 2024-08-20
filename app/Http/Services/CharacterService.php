<?php

namespace App\Http\Services;

use App\Models\Character;

class CharacterService
{
    public static function getCharacters()
    {
        $query = Character::query();

        return $query->paginate(10);
    }
}
