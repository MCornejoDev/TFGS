<?php

namespace App\Models;

use App\Enums\Races;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_type_id',
        'user_id',
        'game_id',
        'race',
        'name',
        'nickname',
        'gender',
        'personality',
        'skills',
        'age',
        'height',
        'weight',
        'health',
        'level',
        'strength',
        'dexterity',
        'constitution',
        'intelligence',
        'wisdom',
        'charisma',
        'items',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

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
    protected function raceLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => Races::from($this->race)->label,
        );
    }

    /**
     * Get the image of race.
     *
     * @return string
     */
    protected function raceImage(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/images/races/' . Races::lowerCase($this->race) . '.png'),
        );
    }

    /**
     * Get the image of gender.
     *
     * @return string
     */
    protected function genderImage(): Attribute
    {
        return Attribute::make(
            get: fn() =>  $this->gender ? asset('storage/images/genres/female.png') : asset('storage/images/genres/male.png'),
        );
    }

    /**
     * Get the label of gender.
     *
     * @return string
     */
    protected function genderLabel(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->gender ? __('characters.genres.female') : __('characters.genres.male'),
        );
    }
}
