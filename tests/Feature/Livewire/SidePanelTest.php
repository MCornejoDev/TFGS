<?php

namespace Tests\Feature\Livewire;

use App\Models\User;
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
