<?php

namespace Database\Factories;

use App\Enums\Races;
use App\Models\CharacterType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'character_type_id' => CharacterType::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'game_id' => Game::inRandomOrder()->first()->id,
            'race' => Races::getRandomValue(),
            'name' => $this->faker->name,
            'nickname' => $this->faker->name,
            'age' => $this->faker->numberBetween(1, 255),
            'height' => $this->faker->randomFloat(2, 1, 200),
            'weight' => $this->faker->randomFloat(2, 1, 200),
            'gender' => $this->faker->boolean,
            'personality' => $this->faker->sentence,
            'skills' => $this->faker->randomElements(['a', 'b', 'c', 'd']),
            'health' => $this->faker->numberBetween(1, 9999),
            'level' => $this->faker->numberBetween(1, 200),
            'strength' => $this->faker->numberBetween(1, 99),
            'dexterity' => $this->faker->numberBetween(1, 99),
            'constitution' => $this->faker->numberBetween(1, 99),
            'intelligence' => $this->faker->numberBetween(1, 99),
            'wisdom' => $this->faker->numberBetween(1, 99),
            'charisma' => $this->faker->numberBetween(1, 99),
            'items' => $this->faker->sentence,
        ];
    }
}
