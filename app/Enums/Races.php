<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self human()
 * @method static self elf()
 * @method static self dwarf()
 * @method static self halfling()
 * @method static self gnome()
 * @method static self half_elf()
 * @method static self half_dwarf()
 * @method static self orc()
 * @method static self semi_orc()
 */
class Races extends Enum
{
    protected static function values(): array
    {
        return [
            'human' => 1,
            'elf' => 2,
            'dwarf' => 3,
            'halfling' => 4,
            'gnome' => 5,
            'half_elf' => 6,
            'half_dwarf' => 7,
            'orc' => 8,
            'semi_orc' => 9,
        ];
    }

    protected static function labels(): array
    {
        return [
            'human' => 'Human',
            'elf' => 'Elf',
            'dwarf' => 'Dwarf',
            'halfling' => 'Halfling',
            'gnome' => 'Gnome',
            'half_elf' => 'Half Elf',
            'half_dwarf' => 'Half Dwarf',
            'orc' => 'Orc',
            'semi_orc' => 'Semi Orc',
        ];
    }

    public static function withTranslations(): array
    {
        $values = self::values();
        $translations = [];

        foreach ($values as $key => $value) {
            $translations[$value] = __('characters.races.' . $key);
        }

        return $translations;
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
