<?php

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
            $table->increments('id'); // Auto-incrementing primary key
            $table->string('race', 20); // Character's race with a maximum length of 20 characters
            $table->string('character_name', 50); // Character's name with a maximum length of 50 characters
            $table->string('nickname', 50); // Character's nickname with a maximum length of 50 characters
            $table->string('height', 10); // Character's height with a maximum length of 10 characters
            $table->unsignedTinyInteger('age'); // Character's age, max value 255 (using unsignedTinyInteger for up to 3 digits)
            $table->string('weight', 10); // Character's weight with a maximum length of 10 characters
            $table->char('gender', 1); // Character's gender, 1 character
            $table->text('personality'); // Character's personality description
            $table->string('skill1', 30); // Character's first skill with a maximum length of 30 characters
            $table->string('skill2', 30); // Character's second skill with a maximum length of 30 characters
            $table->string('skill3', 30); // Character's third skill with a maximum length of 30 characters
            $table->string('skill4', 30); // Character's fourth skill with a maximum length of 30 characters
            $table->unsignedSmallInteger('health'); // Character's health, max value 9999 (using unsignedSmallInteger for up to 4 digits)
            $table->unsignedSmallInteger('level'); // Character's level, max value 200 (using unsignedSmallInteger for up to 3 digits)
            $table->unsignedTinyInteger('strength'); // Character's strength, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('dexterity'); // Character's dexterity, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('constitution'); // Character's constitution, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('intelligence'); // Character's intelligence, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('wisdom'); // Character's wisdom, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->unsignedTinyInteger('charisma'); // Character's charisma, max value 99 (using unsignedTinyInteger for up to 2 digits)
            $table->text('items'); // Character's items description

            $table->timestamps(); // Adds created_at and updated_at columns
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
