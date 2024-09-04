<?php

namespace App\Livewire\Character;

use App\Enums\Armors;
use App\Enums\CharacterTypes;
use App\Enums\Races;
use App\Enums\Weapons;
use App\Http\Services\CharacterService;
use App\Models\Character;
use App\Models\Game;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Str;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use WireUiActions;

    public array $form = [
        'gameId' => null,
        'characterTypeId' => null,
        'weaponId' => null,
        'armorId' => null,
        'raceId' => null,
        'gender' => null,
        'age' => null,
        'name' => null,
        'nickname' => null,
        'personality' => '',
        'skills' => [],
        'strength' => null,
        'dexterity' => null,
        'constitution' => null,
        'intelligence' => null,
        'wisdom' => null,
        'charisma' => null,
        'height' => null,
        'weight' => null,
        'health' => null,
        'level' => null,
    ];

    public function rules()
    {
        return [
            'form.gameId' => 'required',
            'form.characterTypeId' => 'required',
            'form.raceId' => 'required',
            'form.gender' => 'required',
            'form.age' => 'required|numeric|min:1',
            'form.name' => 'required',
            'form.nickname' => 'required',
            'form.weaponId' => 'required',
            'form.strength' => 'required|numeric|min:1',
            'form.dexterity' => 'required|numeric|min:1',
            'form.constitution' => 'required|numeric|min:1',
            'form.intelligence' => 'required|numeric|min:1',
            'form.wisdom' => 'required|numeric|min:1',
            'form.charisma' => 'required|numeric|min:1',
            'form.height' => 'required|numeric|min:1',
            'form.weight' => 'required|numeric|min:1',
            'form.health' => 'required|numeric|min:1',
            'form.level' => 'required|numeric|min:1',
        ];
    }

    public function mount()
    {
        $this->resetValidation();
    }

    #[Computed()]
    public function games()
    {
        return Game::select(['id', 'name', 'comments'])->get()->toArray();
    }

    #[Computed()]
    public function characterTypes()
    {
        return array_map(fn($key, $value) => [
            'id' => $key,
            'name' => $value,
            'image' => asset('storage/images/character_types/' . CharacterTypes::lowerCase($key) . '.png'),
        ], CharacterTypes::toValues(), CharacterTypes::withTranslations());
    }

    #[Computed()]
    public function races()
    {
        return array_map(fn($key, $value) => [
            'id' => $key,
            'name' => $value,
            'image' => asset('storage/images/races/' . Races::lowerCase($key) . '.png'),
        ], Races::toValues(), Races::withTranslations());
    }

    #[Computed()]
    public function genders()
    {
        return [
            [
                'id' => false,
                'name' => __('characters.genders.male'),
            ],
            [
                'id' => true,
                'name' => __('characters.genders.female'),
            ],
        ];
    }

    #[Computed()]
    public function weapons()
    {
        $weaponsByCharacterType = $this->form['characterTypeId'] ? Weapons::weaponByCharacterType($this->form['characterTypeId']) : [];
        return collect($weaponsByCharacterType)->map(function ($weapon) {
            return [
                'id' => $weapon->value,
                'name' => __('characters.weapons.' . snake_lower($weapon->label)),
                'image' => asset('storage/images/weapons/' . snake_lower($weapon->label) . '.png'),
            ];
        })->sortBy('name')->values();
    }

    #[Computed()]
    public function armor()
    {
        return Armors::armorByCharacterType($this->form['characterTypeId']);
    }

    #[Computed()]
    public function armorLabel()
    {
        return __('characters.armors.' . $this->armor->label);
    }

    public function updatedForm($value, $key)
    {
        if ($key === 'characterTypeId') {
            $this->form['weaponId'] = null;
            $this->form['armorId'] = $this->armor->value;
        }
    }

    public function create()
    {
        $this->validate();

        $response = CharacterService::create($this->form);

        if ($response instanceof Character) {
            $this->dispatch('closePanel');
            $this->reset();
            $this->resetValidation();
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('characters.actions.create.form.success.title'),
                'description' => __('characters.actions.create.form.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('characters.actions.create.form.error.title'),
                'description' => __('characters.actions.create.form.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.character.create');
    }
}
