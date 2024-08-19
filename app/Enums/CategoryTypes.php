<?php

namespace App\Enums;

use Spatie\Enum\Enum;
use Illuminate\Support\Str;

/**
 * @method static self spare_parts()
 * @method static self accessories()
 * @method static self tools()
 * @method static self maintenance()
 * @method static self electronics()
 */
class CategoryTypes extends Enum
{
    protected static function values(): array
    {
        return [
            'spare_parts' => 1,
            'accessories' => 2,
            'tools' => 3,
            'maintenance' => 4,
            'electronics' => 5,
        ];
    }

    protected static function labels(): array
    {
        return [
            'spare_parts' => 'Spare Parts',
            'accessories' => 'Accessories',
            'tools' => 'Tools',
            'maintenance' => 'Maintenance',
            'electronics' => 'Electronics',
        ];
    }

    public static function router(): array
    {
        return array_map(function ($value) {
            return self::snake($value);
        }, CategoryTypes::labels());
    }

    public static function snake($value)
    {
        return Str::snake($value);
    }

    public static function getRandomValue(): int
    {
        return self::toValues()[array_rand(self::toValues())];
    }
}
