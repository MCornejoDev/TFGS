<?php

namespace Tests\Feature\Livewire\Game;

use App\Livewire\Game\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function renders_successfully()
    {
        Livewire::test(Create::class)
            ->assertStatus(200);
    }
}
