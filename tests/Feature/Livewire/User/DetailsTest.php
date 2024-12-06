<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\Details;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DetailsTest extends TestCase
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

        // WHEN the user visits the details page
        Livewire::test(Details::class)
            // THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }
}
