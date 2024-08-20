<?php

use App\Enums\Armors;
use App\Enums\CharacterTypes;
use App\Enums\Weapons;
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
        Schema::create('character_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Character::class)->constrained();
            $table->enum('type', CharacterTypes::toValues());
            $table->enum('weapon', Weapons::toValues());
            $table->enum('armor', Armors::toValues());
            $table->boolean('shield')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_types');
    }
};
