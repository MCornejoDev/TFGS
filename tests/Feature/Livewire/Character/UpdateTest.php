<?php

namespace Tests\Feature\Livewire\Character;

use App\Livewire\Character\Update;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Update::class)
            ->assertStatus(200);
    }
}
