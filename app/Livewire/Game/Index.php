<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    use WithPagination, WireUiActions;

    public $search = '';
    public $filters = [];
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $playersToShow = 1;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function loadRecords()
    {
        return $this->games;
    }

    #[Computed()]
    public function games()
    {
        return GameService::getGames($this->search, $this->filters, $this->sortField, $this->sortDirection);
    }

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function confirm(int $id)
    {
        $this->dialog()->confirm([
            'title' => __('games.actions.delete.title'),
            'description' => __('games.actions.delete.description'),
            'icon' => 'trash',
            'accept' => [
                'label' => __('games.actions.delete.accept'),
                'method' => 'remove',
                'params' => $id,
                'class' => 'bg-red-500 text-white hover:bg-red-600 hover:text-white',
            ],
            'reject' => [
                'label' => __('games.actions.delete.reject'),
            ],
        ]);
    }

    public function remove(int $id)
    {
        $result = GameService::remove($id);

        if ($result) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('games.actions.delete.success.title'),
                'description' => __('games.actions.delete.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('games.actions.delete.error.title'),
                'description' => __('games.actions.delete.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.game.index');
    }
}
