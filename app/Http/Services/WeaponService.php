<?php

namespace App\Http\Services;

use App\Enums\Weapons;
use Illuminate\Support\Collection;

class WeaponService
{
    public static function getWeapons(?int $characterTypeId): array|Collection
    {
        if (!$characterTypeId) {
            return [];
        }

        return collect(Weapons::weaponByCharacterType($characterTypeId))->map(function ($weapon) {
            return [
                'id' => $weapon->value,
                'name' => __('characters.weapons.' . snake_lower($weapon->label)),
                'image' => asset('storage/images/weapons/' . snake_lower($weapon->label) . '.png'),
            ];
        })->sortBy('name')->values();
    }
}
