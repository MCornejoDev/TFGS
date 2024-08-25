<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed()]
    public function games()
    {
        return GameService::getGames();
    }

    public function render()
    {
        return view('livewire.game.index');
    }
}
