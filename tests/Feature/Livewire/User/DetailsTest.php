<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\Details;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DetailsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Details::class)
            ->assertStatus(200);
    }
}
