<?php

namespace App\Enums;

use Spatie\Enum\Enum;
use Str;

/**
 * @method static self staff()
 * @method static self scepter()
 * @method static self wand()
 * @method static self sword()
 * @method static self axe()
 * @method static self greatsword()
 * @method static self mace()
 * @method static self pickaxe()
 * @method static self double_swords()
 * @method static self bow()
 * @method static self crossbow()
 * @method static self daggers()
 * @method static self knives()
 */
class Weapons extends Enum
{
    protected static function values(): array
    {
        return [
            'staff' => 1,
            'scepter' => 2,
            'wand' => 3,
            'sword' => 4,
            'axe' => 5,
            'greatsword' => 6,
            'mace' => 7,
            'pickaxe' => 8,
            'double_swords' => 9,
            'bow' => 10,
            'crossbow' => 11,
            'daggers' => 12,
            'knives' => 13,
        ];
    }

    protected static function labels(): array
    {
        return [
            'staff' => 'Staff',
            'scepter' => 'Scepter',
            'wand' => 'Wand',
            'sword' => 'Sword',
            'axe' => 'Axe',
            'greatsword' => 'Greatsword',
            'mace' => 'Mace',
            'pickaxe' => 'Pickaxe',
            'double_swords' => 'Double Swords',
            'bow' => 'Bow',
            'crossbow' => 'Crossbow',
            'daggers' => 'Daggers',
            'knives' => 'Knives',
        ];
    }

    public static function weaponByCharacterType(string $characterType): array
    {

        //TODO : REVISAR Y HACER LO MISMO QUE EN ARMORS
        return match ($characterType) {
            'cleric', 'sorcerer', 'wizard', 'druid', 'monk', 'bard' => array('Staff', 'Scepter', 'Wand'),
            'barbarian', 'warrior', 'paladin' => array('Sword', 'Axe', 'Greatsword', 'Mace', 'Pickaxe', 'Double Swords'),
            'ranger'  => array('Bow', 'Crossbow'),
            'rogue' => array('Daggers', 'Knives'),
            default => [],
        };
    }

    public static function weaponByArray(array $characterType): array
    {
        $translations = [];

        foreach ($characterType as $key => $value) {
            $translations[$key] = __('characters.weapons.' . snake_lower($value));
        }

        return $translations;
    }

    public static function withTranslations(): array
    {
        $values = self::values();
        $translations = [];

        foreach ($values as $key => $value) {
            $translations[$value] = __('characters.weapons.' . $key);
        }

        return $translations;
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
