<?php

namespace Tests\Feature\Livewire\Game;

use App\Livewire\Game\Info;
use App\Models\Character;
use App\Models\CharacterType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class InfoTest extends TestCase
{
    use RefreshDatabase;

    private Game $game;

    protected Collection $characters;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        CharacterType::factory()->create();
        $this->game = Game::factory()->create();
        $this->characters = Character::factory()->create([
            'game_id' => $this->game->id,
        ]);
    }

    #[Test]
    public function renders_successfully()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user visits the info page about a game
        Livewire::test(Info::class, ['id' => $this->game->id])
            // THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK)
            ->assertSee($this->game->name)
            ->assertSee($this->game->date_start)
            ->assertSee($this->game->description)
            ->assertSee($this->game->comments)
            ->assertViewHas('characters', function () {
                return $this->characters->count() == 1;
            });
    }
}
