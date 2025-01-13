<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Info extends Component
{
    public int $id;

    #[Computed()]
    public function game()
    {
        return GameService::getGameById($this->id);
    }

    public function render()
    {
        return view('livewire.game.info');
    }
}
