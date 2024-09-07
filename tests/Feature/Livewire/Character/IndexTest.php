<?php

namespace Tests\Feature\Livewire\Character;

use App\Livewire\Character\Index;
use App\Models\Character;
use App\Models\CharacterType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected  $characters;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->characters = Character::factory()->count(10)->create([
            'character_type_id' => CharacterType::factory()->create()->id,
            'game_id' => Game::factory()->create()->id,
        ]);
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the index page
        Livewire::test(Index::class)
            //THEN the page should render successfully with the characters
            ->assertStatus(200)
            ->assertViewHas('characters', function () {
                return count($this->characters) == 10;
            });
    }
}
