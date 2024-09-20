<?php

namespace Tests\Feature\Livewire\Game;

use App\Livewire\Game\Create;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Game $game;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->game = Game::factory()->make();
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the create page
        Livewire::test(Create::class)
            //THEN the page should render successfully
            ->assertStatus(200);
    }

    #[Test]
    public function can_create_game()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        $this->assertDatabaseMissing('games', [
            'name' => $this->game->name,
            'date_start' => $this->game->date_start,
            'comments' => $this->game->comments,
        ]);

        // WHEN the user wants to create a new game, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the game
            ->set('form.name', $this->game->name)
            ->set('form.date_start',  '2022-01-01')
            ->set('form.comments', $this->game->comments)
            ->set('form.users', [
                $this->user->id,
                User::inRandomOrder()->first()->id,
            ])
            ->call('create')
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('closePanel')
            ->assertDispatched('wireui:notification')
            ->assertDispatched('refresh')
            ->assertDispatched('resetAll');

        $this->assertDatabaseHas('games', [
            'name' => $this->game->name,
            'date_start' => $this->game->date_start,
            'comments' => $this->game->comments,
        ]);
    }
}
