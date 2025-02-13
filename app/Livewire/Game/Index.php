<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use App\Livewire\Traits\DateTime;
use App\Livewire\Traits\ResetsPage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    use DateTime, WireUiActions, WithPagination, ResetsPage;

    #[On('refresh')]
    public function refresh(): void
    {
        $this->resetPage();
    }

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
                'model' => 'filters.date_start',
            ],
        ];
    }

    #[Computed()]
    public function games()
    {
        //TODAVIA HAY QUE AÑADIR QUE EL ADMIN PUEDA VER TODAS LAS PARTIDAS

        return GameService::getGames($this->search, $this->filters, $this->sortField, $this->sortDirection)
            ->paginate(8);
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
            component: Create::class,
            icon: 'squares-plus',
        );
    }

    public function render()
    {
        return view('livewire.game.index');
    }
}
