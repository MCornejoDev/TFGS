<?php

namespace Tests\Feature\Livewire\Character;

use App\Livewire\Character\Update;
use App\Models\Character;
use App\Models\CharacterType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Http\Response;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Character $character;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->character = Character::factory()->create([
            'character_type_id' => CharacterType::factory()->create()->id,
            'game_id' => Game::factory()->create()->id,
        ]);
    }


    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the update page
        Livewire::test(Update::class, ['character' => $this->character->toArray()])
            //THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }
}
