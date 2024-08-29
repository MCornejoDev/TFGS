<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SidePanel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SidePanelTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SidePanel::class)
            ->assertStatus(200);
    }
}
