<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self cleric()
 * @method static self sorcerer()
 * @method static self wizard()
 * @method static self druid()
 * @method static self barbarian()
 * @method static self warrior()
 * @method static self paladin()
 * @method static self ranger()
 * @method static self bard()
 * @method static self rogue()
 * @method static self monk()
 */
class CharacterTypes extends Enum
{
    protected static function values(): array
    {
        return [
            'cleric' => 1,
            'sorcerer' => 2,
            'wizard' => 3,
            'druid' => 4,
            'barbarian' => 5,
            'warrior' => 6,
            'paladin' => 7,
            'ranger' => 8,
            'bard' => 9,
            'rogue' => 10,
            'monk' => 11,
        ];
    }

    protected static function labels(): array
    {
        return [
            'cleric' => 'Cleric',
            'sorcerer' => 'Sorcerer',
            'wizard' => 'Wizard',
            'druid' => 'Druid',
            'barbarian' => 'Barbarian',
            'warrior' => 'Warrior',
            'paladin' => 'Paladin',
            'ranger' => 'Ranger',
            'bard' => 'Bard',
            'rogue' => 'Rogue',
            'monk' => 'Monk',
        ];
    }

    public static function withTranslations(): array
    {
        $values = self::values();
        $translations = [];

        foreach ($values as $key => $value) {
            $translations[$value] = __('characters.characters_types.'.$key);
        }

        return $translations;
    }

    public static function lowerCase(string $value): string
    {
        return strtolower(self::from($value)->label);
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
