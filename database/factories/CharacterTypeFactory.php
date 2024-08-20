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
        return [
            'type' => CharacterTypes::getRandomValue(),
            'weapon' => Weapons::getRandomValue(),
            'armor' => Armors::getRandomValue(),
            'shield' => $this->faker->boolean,
        ];
    }
}
