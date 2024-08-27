<?php

namespace App\Livewire\Character;

use App\Enums\CharacterTypes;
use App\Enums\Races;
use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    use WithPagination, WireUiActions;

    public string $search = "";

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
    public function characters()
    {
        return CharacterService::getCharacters($this->search, $this->filters, $this->sortField, $this->sortDirection);
    }

    #[Computed()]
    public function races()
    {
        return Races::withTranslations();
    }

    #[Computed()]
    public function characterTypes()
    {
        return CharacterTypes::withTranslations();
    }

    #[Computed()]
    public function genders()
    {
        return [
            false => __('characters.genders.male'),
            true => __('characters.genders.female'),
        ];
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
                'filter' => 'race',
            ],
            [
                'type' => 'select',
                'data' => $this->characterTypes,
                'label' => __('characters.filters.characters_types.select'),
                'filter' => 'characterType',
            ],
            [
                'type' => 'select',
                'data' => $this->genders,
                'label' => __('characters.filters.genders.select'),
                'filter' => 'gender',
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
        $this->filters = [
            'race' => null,
            'characterType' => null,
            'gender' => null,
        ];
        $this->resetPage();
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

    public function render()
    {
        return view('livewire.character.index');
    }
}
