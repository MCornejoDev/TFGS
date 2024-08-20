<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacterHistory>
 */
class CharacterHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->foreignIdFor(\App\Models\Character::class)->constrained(); // Relación con characters
            // $table->foreignIdFor(\App\Models\Game::class)->constrained(); // Relación con Games
            // $table->string('change_type', 50); // Tipo de cambio (e.g., "Nivel", "Salud", "Item añadido", etc.)
            // $table->text('description')->nullable(); // Descripción del cambio
            // $table->unsignedSmallInteger('previous_value')->nullable(); // Valor antes del cambio
            // $table->unsignedSmallInteger('new_value')->nullable(); // Nuevo valor después del cambio
            // $table->timestamp('change_date')->useCurrent(); // Fecha y hora del cambio

            'character_id' => Character::inRandomOrder()->first()->id,
            'game_id' => Game::inRandomOrder()->first()->id,
            'change_type' => $this->faker->word(),
            'description' => $this->faker->sentence,
            'previous_value' => $this->faker->numberBetween(1, 9999),
            'new_value' => $this->faker->numberBetween(1, 9999),
        ];
    }
}
