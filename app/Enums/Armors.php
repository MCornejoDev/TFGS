<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self heavy_chain_mail()
 * @method static self leather_armor()
 * @method static self cloth_armor()
 */
class Armors extends Enum
{
    protected static function values(): array
    {
        return [
            'heavy_chain_mail' => 1,
            'leather_armor' => 2,
            'cloth_armor' => 3,
        ];
    }

    protected static function labels(): array
    {
        return [
            'heavy_chain_mail' => 'Heavy Chain Mail',
            'leather_armor' => 'Medium or Heavy Leather Armor',
            'cloth_armor' => 'Cloth Armor',
        ];
    }

    public static function armorByCharacterType(string $characterType): string
    {
        return match ($characterType) {
            'barbarian', 'warrior', 'paladin' => 'Heavy Chain Mail',
            'ranger', 'bard', 'rogue' => 'Medium or Heavy Leather Armor',
            'cleric', 'sorcerer', 'wizard', 'monk', 'druid' => 'Cloth Armor',
        };
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
