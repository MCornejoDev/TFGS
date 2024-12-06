<?php

namespace Tests\Feature\Livewire\Tool;

use App\Livewire\Tool\Index;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Http\Response;

class IndexTest extends TestCase
{
    #[Test]
    public function renders_successfully()
    {
        Livewire::test(Index::class)
            ->assertStatus(Response::HTTP_OK);
    }
}
