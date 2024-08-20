<?php

namespace App\Models;

use App\Enums\Races;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    public function characterType()
    {
        return $this->belongsTo(CharacterType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get the label of race.
     *
     * @return string
     */
    protected function race(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Races::from($value)->label,
        );
    }

    /**
     * Get the label of gender.
     *
     * @return string
     */
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $value ? 'Male' : 'Female',
        );
    }
}
