<?php

namespace Tests\Feature\Livewire\Game;

use App\Livewire\Game\Info;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InfoTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Info::class)
            ->assertStatus(200);
    }
}
