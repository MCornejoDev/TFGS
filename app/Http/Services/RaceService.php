<?php

namespace App\Http\Services;

use App\Enums\Races;
use Illuminate\Support\Collection;

class RaceService
{
    public static function getRaces(): Collection
    {
        return collect(Races::withTranslations())->map(function ($value, $key) {
            return [
                'id' => $key,
                'name' => $value,
                'image' => asset('storage/images/races/' . Races::lowerCase($key) . '.png'),
            ];
        })->sortBy('name')->values();
    }
}
