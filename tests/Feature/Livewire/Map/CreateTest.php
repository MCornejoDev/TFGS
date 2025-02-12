<?php

namespace Tests\Feature\Livewire\Map;

use App\Livewire\Map\Create;
use App\Models\Map;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Storage;
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

        Storage::fake('images/maps');
        $file = UploadedFile::fake()->image('map.png');

        // WHEN the user wants to create a new map, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the map
            ->set('form.name', $this->map->name)
            ->set('form.image', $file)
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

        Storage::fake('images/maps');
        UploadedFile::fake()->image('map.pdf');

        // WHEN the user wants to create a new map, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the map
            ->call('create')
            // THEN the view shows the errors
            ->assertHasErrors(['form.image']);

        $this->assertDatabaseMissing('maps', [
            'name' => $this->map->name,
        ]);
    }
}
