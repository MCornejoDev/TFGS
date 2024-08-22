<?php

namespace App\Livewire\Character;

use App\Enums\CharacterTypes;
use App\Enums\Races;
use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

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

    public function render()
    {
        return view('livewire.character.index');
    }
}
