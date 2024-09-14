<?php

namespace App\Livewire\Character;

use App\Http\Services\CharacterService;
use App\Http\Services\RaceService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    use WireUiActions, WithPagination;

    #[On('refresh')]
    public function refresh(): void
    {
        $this->resetPage();
    }

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

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function loadRecords()
    {
        return $this->characters;
    }

    #[Computed()]
    public function allFilters()
    {
        return [
            [
                'type' => 'text',
                'label' => __('characters.filters.search.placeholder'),
            ],
            [
                'type' => 'select',
                'data' => $this->races,
                'label' => __('characters.filters.races.select'),
                'placeholder' => __('characters.filters.races.select'),
                'filter' => 'filters.race',
                'isMultiple' => true,
            ],
            [
                'type' => 'select',
                'data' => $this->characterTypes,
                'label' => __('characters.filters.characters_types.select'),
                'placeholder' => __('characters.filters.characters_types.select'),
                'filter' => 'filters.characterType',
                'isMultiple' => true,
            ],
            [
                'type' => 'select',
                'data' => $this->genres,
                'label' => __('characters.filters.genres.select'),
                'placeholder' => __('characters.filters.genres.select'),
                'filter' => 'filters.gender',
            ],
        ];
    }

    public function clearFilters()
    {
        $this->dispatch('resetDateTimePicker');
        $this->search = '';
        $this->reset();
        $this->resetPage();
        $this->dispatch('resetAll');
    }

    #[Computed()]
    public function characters()
    {
        return CharacterService::getCharacters($this->search, $this->filters, $this->sortField, $this->sortDirection);
    }

    #[Computed()]
    public function races()
    {
        return RaceService::getRaces();
    }

    #[Computed()]
    public function characterTypes()
    {
        return CharacterService::getCharacterTypes();
    }

    #[Computed()]
    public function genres()
    {
        return CharacterService::getGenres();
    }

    public function confirm(int $id)
    {
        $this->dialog()->confirm([
            'title' => __('characters.actions.delete.title'),
            'description' => __('characters.actions.delete.description'),
            'icon' => 'trash',
            'accept' => [
                'label' => __('characters.actions.delete.accept'),
                'method' => 'remove',
                'params' => $id,
                'class' => 'bg-red-500 text-white hover:bg-red-600 hover:text-white',
            ],
            'reject' => [
                'label' => __('characters.actions.delete.reject'),
            ],
        ]);
    }

    public function remove(int $id)
    {
        $result = CharacterService::remove($id);

        if ($result) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('characters.actions.delete.success.title'),
                'description' => __('characters.actions.delete.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('characters.actions.delete.error.title'),
                'description' => __('characters.actions.delete.error.description'),
            ]);
        }
    }

    public function openSidePanel(): void
    {
        $this->dispatch(
            'openPanel',
            title: __('characters.actions.create.title'),
            component: 'character.create',
            icon: 'user-plus',
        );
    }

    public function render()
    {
        return view('livewire.character.index');
    }
}
