<?php

use App\Models\Game;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('character_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Character::class)->constrained(); // Relación con characters
            $table->foreignIdFor(\App\Models\Game::class)->constrained(); // Relación con Games
            $table->string('change_type', 50); // Tipo de cambio (e.g., "Nivel", "Salud", "Item añadido", etc.)
            $table->text('description')->nullable(); // Descripción del cambio
            $table->unsignedSmallInteger('previous_value')->nullable(); // Valor antes del cambio
            $table->unsignedSmallInteger('new_value')->nullable(); // Nuevo valor después del cambio
            $table->timestamp('change_date')->useCurrent(); // Fecha y hora del cambio
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_histories');
    }
};
