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
            $table->foreignIdFor(\App\Models\Game::class)->constrained();
            $table->date('date');
            $table->string('state', 50);

            // The user can make changes to the character and they will be recorded
            $table->unsignedTinyInteger('health'); // Character's health, max value 9999 (using unsignedSmallInteger for up to 4 digits)
            $table->unsignedTinyInteger('age'); // Character's age, max value 255 (using unsignedTinyInteger for up to 3 digits)
            $table->unsignedTinyInteger('level'); // Character's level, max value 200 (using unsignedSmallInteger for up to 3 digits)
            $table->unsignedTinyInteger('strength'); // Character's strength, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('dexterity'); // Character's dexterity, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('constitution'); // Character's constitution, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('intelligence'); // Character's intelligence, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('wisdom'); // Character's wisdom, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('charisma'); // Character's charisma, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->text('items'); // Character's items description
            $table->timestamps();
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
