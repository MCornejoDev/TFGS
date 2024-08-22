<?php

use App\Enums\Races;
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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\CharacterType::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\Game::class)->constrained();
            $table->enum('race', Races::toValues());
            $table->string('name', 50);
            $table->string('nickname', 50);
            $table->boolean('gender')->default(false); //false = male, true = female
            $table->text('personality');
            $table->string('skill1', 30);
            $table->string('skill2', 30);
            $table->string('skill3', 30);
            $table->string('skill4', 30);

            // Stats that can be changed
            $table->unsignedTinyInteger('age');
            $table->decimal('height', 5, 2);
            $table->decimal('weight', 5, 2);
            $table->unsignedSmallInteger('health');
            $table->unsignedSmallInteger('level');
            $table->unsignedTinyInteger('strength');
            $table->unsignedTinyInteger('dexterity');
            $table->unsignedTinyInteger('constitution');
            $table->unsignedTinyInteger('intelligence');
            $table->unsignedTinyInteger('wisdom');
            $table->unsignedTinyInteger('charisma');
            $table->text('items');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
