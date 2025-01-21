<?php

namespace App\Livewire\Game;

use App\Http\Services\CharacterService;
use App\Http\Services\GameService;
use App\Livewire\Traits\ResetsPage;
use App\Models\Character;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Info extends Component
{
    use WireUiActions, WithPagination, ResetsPage;

    public int $id;

    protected $queryString = [
        'characterPage' => ['except' => 1],
    ];


    #[On('refresh')]
    public function refresh(): void
    {
        $this->resetPage();
    }

    public $sortField = 'name';

    public $sortDirection = 'asc';

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    /**HAY QUE REVISAR ESTO PORQUE ESTAMOS CARGANDO SOLO UNA LISTA DE REGISTROS ¿SI TENEMOS MÁS DE UNA? */
    public function loadRecords()
    {
        return $this->characters;
    }

    #[Computed()]
    public function game()
    {
        return GameService::getGameById($this->id);
    }

    #[Computed()]
    public function characters()
    {
        return $this->game->characters()
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5, ['*'], 'characterPageName');
    }

    public function render()
    {
        return view('livewire.game.info');
    }
}
