<?php

namespace Tests\Feature\Livewire\Map;

use App\Livewire\Map\Index;
use App\Models\Map;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Http\Response;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected $maps;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->maps = Map::factory()->count(10)->create();
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the index page
        Livewire::test(Index::class)
            //THEN the page should render successfully with the maps
            ->assertStatus(200)
            ->assertViewHas('maps', function () {
                return count($this->maps->toArray()) == 10;
            });
    }

    #[Test]
    public function can_open_side_panel()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new map, clicking the button in the index page
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

        // WHEN the user wants to delete a map, clicking the button in the index page
        Livewire::test(Index::class)
            // Call the method to confirm the deletion of a map
            ->call('confirm', $this->maps->first()->id)
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('wireui:confirm-dialog');
    }

    #[Test]
    public function can_delete_map()
    {
        // GIVEN a user is logged in and there is a maps in the database
        $this->actingAs($this->user);

        $this->assertDatabaseHas('maps', [
            'id' => $this->maps->first()->id,
        ]);

        // WHEN the user wants to delete a map, clicking the button in the index page
        Livewire::test(Index::class)
            // Call the method to delete the map
            ->call('remove', $this->maps->first()->id)
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('wireui:notification');

        $this->assertDatabaseMissing('maps', [
            'id' => $this->maps->first()->id,
        ]);
    }
}
