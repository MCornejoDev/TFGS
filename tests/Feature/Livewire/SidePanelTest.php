<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Game\Index;
use App\Livewire\SidePanel;
use App\Models\User;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SidePanelTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
}
