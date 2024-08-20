<?php

namespace App\Livewire\Character;

use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed()]
    public function characters()
    {
        return CharacterService::getCharacters();
    }

    public function render()
    {
        return view('livewire.character.index');
    }
}
