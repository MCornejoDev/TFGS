<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SidePanel;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SidePanelTest extends TestCase
{
    #[Test]
    public function renders_successfully()
    {
        Livewire::test(SidePanel::class)
            ->assertStatus(200);
    }
}
