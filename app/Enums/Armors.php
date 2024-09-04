<?php

namespace App\Enums;

use Spatie\Enum\Enum;
use App\Enums\Races;
use App\Models\Character;
use Str;

/**
 * @method static self heavy_chain_mail()
 * @method static self leather_armor()
 * @method static self cloth_armor()
 * @method static self no_armor()
 */
class Armors extends Enum
{
    protected static function values(): array
    {
        return [
            'heavy_chain_mail' => 1,
            'leather_armor' => 2,
            'cloth_armor' => 3,
            'no_armor' => 4,
        ];
    }

    protected static function labels(): array
    {
        return [
            'heavy_chain_mail' => 'heavy_chain_mail',
            'leather_armor' => 'leather_armor',
            'cloth_armor' => 'cloth_armor',
            'no_armor' => 'no_armor',
        ];
    }

    public static function armorByCharacterType(?int $characterType): Armors
    {
        return match ($characterType) {
            CharacterTypes::barbarian()->value, CharacterTypes::warrior()->value, CharacterTypes::paladin()->value => self::heavy_chain_mail(),
            CharacterTypes::ranger()->value, CharacterTypes::bard()->value => self::leather_armor(),
            CharacterTypes::cleric()->value, CharacterTypes::sorcerer()->value,
            CharacterTypes::wizard()->value, CharacterTypes::druid()->value,
            CharacterTypes::monk()->value, CharacterTypes::rogue()->value => self::cloth_armor(),
            default => self::no_armor(),
        };
    }

    public static function lowerCase(string $value): string
    {
        return strtolower(Str::snake(self::from($value)->label));
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
