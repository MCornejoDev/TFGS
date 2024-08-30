<?php

namespace App\Livewire\Character;

use App\Enums\CharacterTypes;
use App\Models\Game;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    #[Computed()]
    public function games()
    {
        return Game::select(['id', 'name', 'comments'])->get();
    }

    #[Computed()]
    public function characterTypes()
    {
        return CharacterTypes::withTranslations();
    }

    public function render()
    {
        return view('livewire.character.create');
    }
}
