<?php

namespace Tests\Feature\Livewire\Map;

use App\Livewire\Map\Create;
use App\Models\Map;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Map $map;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->map = Map::factory()->make();
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the create page
        Livewire::test(Create::class)
            //THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }

    #[Test]
    public function can_create_a_map()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        $this->assertDatabaseMissing('maps', [
            'name' => $this->map->name,
        ]);

        // WHEN the user wants to create a new map, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the map
            ->set('form.name', $this->map->name)
            ->call('create')
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('closePanel')
            ->assertDispatched('wireui:notification')
            ->assertDispatched('refresh')
            ->assertDispatched('resetAll');

        $this->assertDatabaseHas('maps', [
            'name' => $this->map->name,
        ]);
    }

    #[Test]
    public function can_not_create_a_map_with_some_fields_empty()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new map, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the map
            ->set('form.name', null)
            ->call('create')
            // THEN the view shows the errors
            ->assertHasErrors(['form.name']);

        $this->assertDatabaseMissing('maps', [
            'name' => $this->map->name,
        ]);
    }

    #[Test]
    public function can_not_create_a_map_by_error()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new map, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the map
            ->set('form.name', fake()->word(50))
            ->call('create')
            // THEN Something went wrong
            ->assertDispatched('wireui:notification');

        $this->assertDatabaseMissing('maps', [
            'name' => $this->map->name,
        ]);
    }
}
