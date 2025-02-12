<?php

namespace Tests\Feature\Livewire\Map;

use App\Livewire\Map\Update;
use App\Models\Map;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Map $map;

    protected UploadedFile $file;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('images/maps');
        $this->file = UploadedFile::fake()->image('map.png');

        $this->user = User::factory()->create();
        $this->map = Map::factory()->create([
            'link' => $this->file,
        ]);
    }

    #[Test]
    public function update_a_map_correctly()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to update a new map, clicking the button in the update page
        Livewire::test(Update::class, ['id' => $this->map->id])
            // Call the method to update the map
            ->set('form.name', $this->map->name)
            ->set('form.image', $this->file)
            ->call('update')
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('closePanel')
            ->assertDispatched('wireui:notification')
            ->assertDispatched('refresh');
    }

    #[Test]
    public function can_not_update_a_map_with_some_fields_empty()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to update a new map, clicking the button in the update page
        Livewire::test(Update::class, ['id' => $this->map->id])
            // Call the method to update the map
            ->set('form.image', 'asas')
            ->call('update')
            // THEN the view shows the errors
            ->assertHasErrors(['form.image']);
    }
}
