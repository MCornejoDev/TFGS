<?php

namespace Database\Factories;

use App\Enums\Armors;
use App\Enums\CharacterTypes;
use App\Enums\Weapons;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacterType>
 */
class CharacterTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $characterType = CharacterTypes::getRandomValue();
        $weapon = Weapons::weaponByCharacterType($characterType);
        $armor = Armors::armorByCharacterType($characterType);

        return [
            'type' => $characterType,
            'weapon' => $weapon[array_rand($weapon)]->value,
            'armor' => $armor->value,
            'shield' => $this->faker->boolean,
        ];
    }
}
