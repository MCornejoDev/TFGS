<?php

namespace Tests\Feature\Livewire\Game;

use App\Livewire\Game\Index;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected $games;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->games = Game::factory()->count(10)->create();
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the index page
        Livewire::test(Index::class)
            //THEN the page should render successfully with the games
            ->assertStatus(200)
            ->assertViewHas('games', function () {
                return count($this->games) == 10;
            });
    }

    #[Test]
    public function can_open_side_panel()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new game, clicking the button in the index page
        Livewire::test(Index::class)
            // Call the method to open the side panel
            ->call('openSidePanel')
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('openPanel');
    }

    #[Test]
    public function can_show_confirm_dialog()
    {
        // GIVEN a user is logged
        $this->actingAs($this->user);

        // WHEN the user wants to delete a game, clicking the button in the index page
        Livewire::test(Index::class)
            // Call the method to confirm the deletion of a game
            ->call('confirm', $this->games->first()->id)
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('wireui:confirm-dialog');
    }

    #[Test]
    public function can_delete_game()
    {
        // GIVEN a user is logged in and there is a games in the database
        $this->actingAs($this->user);

        $this->assertDatabaseHas('games', [
            'id' => $this->games->first()->id,
        ]);

        // WHEN the user wants to delete a game, clicking the button in the index page
        Livewire::test(Index::class)
            // Call the method to delete the game
            ->call('remove', $this->games->first()->id)
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('wireui:notification');

        $this->assertDatabaseMissing('games', [
            'id' => $this->games->first()->id,
        ]);
    }
}
