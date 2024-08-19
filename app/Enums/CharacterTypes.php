<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self cleric()
 * @method static self sorcerer()
 * @method static self wizard()
 * @method static self monk()
 * @method static self druid()
 * @method static self barbarian()
 * @method static self warrior()
 * @method static self paladin()
 * @method static self ranger()
 * @method static self bard()
 * @method static self rogue()
 */
class CharacterTypes extends Enum
{
    protected static function values(): array
    {
        return [
            'cleric' => 1,
            'sorcerer' => 2,
            'wizard' => 3,
            'monk' => 4,
            'druid' => 5,
            'barbarian' => 6,
            'warrior' => 7,
            'paladin' => 8,
            'ranger' => 9,
            'bard' => 10,
            'rogue' => 11,
        ];
    }

    protected static function labels(): array
    {
        return [
            'cleric' => 'Cleric',
            'sorcerer' => 'Sorcerer',
            'wizard' => 'Wizard',
            'monk' => 'Monk',
            'druid' => 'Druid',
            'barbarian' => 'Barbarian',
            'warrior' => 'Warrior',
            'paladin' => 'Paladin',
            'ranger' => 'Ranger',
            'bard' => 'Bard',
            'rogue' => 'Rogue',
        ];
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
