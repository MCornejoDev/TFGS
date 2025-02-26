<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\Create;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateTest extends TestCase
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
        dump(Gate::abilities());
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the create page
        Livewire::test(Create::class)
            //THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }

    #[Test]
    public function can_create_game()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);
    }
}
