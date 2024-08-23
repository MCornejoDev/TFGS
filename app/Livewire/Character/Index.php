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

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    #[Computed()]
    public function characters()
    {
        return CharacterService::getCharacters($this->search, $this->filters);
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

    public function setFilter($key, $value)
    {
        $this->filters[$key] = $value;
    }

    public function clearFilters()
    {
        $this->search = "";
        $this->filters = [
            'race' => null,
            'characterType' => null,
            'gender' => null,
        ];
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
            $this->dialog()->success(__('characters.actions.delete.success'));
        } else {
            $this->dialog()->error(__('characters.actions.delete.error'));
        }
    }

    public function render()
    {
        return view('livewire.character.index');
    }
}
