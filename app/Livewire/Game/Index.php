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

    public $filters = [
        'date_start' => null,
    ];

    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $playersToShow = 1;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function loadRecords()
    {
        return $this->games;
    }

    #[Computed()]
    public function allFilters()
    {
        return [
            [
                'type' => 'text',
                'label' => __('games.filters.search.placeholder'),
            ],
            [
                'type' => 'date',
                'label' => __('games.filters.date_start.label'),
                'placeholder' => __('games.filters.date_start.placeholder'),
                'model' => 'date_start',
            ]
        ];
    }

    public function setFilter($key, $value)
    {
        $this->filters[$key] = $value;
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = "";
        $this->reset();
        $this->resetPage();
    }

    #[Computed()]
    public function games()
    {
        return GameService::getGames($this->search, $this->filters, $this->sortField, $this->sortDirection);
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

    public function openSidePanel(): void
    {
        $this->dispatch(
            'openPanel',
            title: __('games.actions.create.title'),
            component: 'game.create',
            icon: 'squares-plus',
        );
    }


    public function render()
    {
        return view('livewire.game.index');
    }
}
