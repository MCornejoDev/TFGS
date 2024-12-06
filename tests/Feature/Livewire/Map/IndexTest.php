<?php

namespace Tests\Feature\Livewire\Map;

use App\Livewire\Map\Index;
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

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    #[Test]
    public function renders_successfully()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user visits the index page
        Livewire::test(Index::class)
            // THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }
}
