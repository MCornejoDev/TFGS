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
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Game::class)->nullable()->constrained()->nullOnDelete();
            $table->enum('race', Races::toValues());
            $table->string('name', 50);
            $table->string('nickname', 50);
            $table->boolean('gender')->default(false); //false = male, true = female
            $table->text('personality');
            $table->json('skills');
            // Stats that can be changed
            $table->unsignedSmallInteger('age');
            $table->decimal('height', 7, 2);
            $table->decimal('weight', 7, 2);
            $table->unsignedSmallInteger('health');
            $table->unsignedSmallInteger('level');
            $table->unsignedSmallInteger('strength');
            $table->unsignedSmallInteger('dexterity');
            $table->unsignedSmallInteger('constitution');
            $table->unsignedSmallInteger('intelligence');
            $table->unsignedSmallInteger('wisdom');
            $table->unsignedSmallInteger('charisma');
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
