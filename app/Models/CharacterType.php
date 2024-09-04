<?php

namespace App\Models;

use App\Enums\Armors;
use App\Enums\CharacterTypes;
use App\Enums\Weapons;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterType extends Model
{
    use HasFactory;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    /**
     * Get the label of character type.
     *
     * @return string
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn() => CharacterTypes::from($this->id)->label,
        );
    }

    /**
     * Get the image of character type.
     *
     * @return string
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/images/character_types/' . CharacterTypes::lowerCase($this->id) . '.png'),
        );
    }

    /**
     * Get the label of weapon.
     *
     * @return string
     */
    protected function weaponLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => Weapons::from($this->weapon)->label,
        );
    }

    /**
     * Get the image of weapon.
     *
     * @return string
     */
    protected function weaponImage(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/images/weapons/' . Weapons::lowerCase($this->weapon) . '.png'),
        );
    }

    /**
     * Get the image of armor.
     *
     * @return string
     */
    protected function armorImage(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/images/armors/' . Armors::lowerCase($this->armor) . '.png'),
        );
    }

    /**
     * Get the label of armor.
     *
     * @return string
     */
    protected function armorLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => Armors::from($this->armor)->label,
        );
    }
}
