<?php

namespace App\Livewire;

use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Welcome extends Component
{
    public string $search = '';

    public $filters = [
        'race' => null,
        'characterType' => null,
        'gender' => null,
    ];

    public $sortField = 'name';

    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    #[Computed()]
    public function characters()
    {
        return CharacterService::getCharacters($this->search, $this->filters, $this->sortField, $this->sortDirection);
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
