<?php

namespace App\Models;

use App\Enums\CharacterTypes;
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
}
