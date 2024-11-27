<?php

namespace App\Livewire\Character;

use App\Enums\Armors;
use App\Enums\Weapons;
use App\Http\Services\CharacterService;
use App\Http\Services\RaceService;
use App\Http\Services\WeaponService;
use App\Models\Character;
use App\Models\Game;
use Livewire\Attributes\Computed;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use WireUiActions;

    public bool $show = false;

    public array $form = [
        'gameId' => null,
        'characterTypeId' => null,
        'weaponId' => null,
        'armorId' => null,
        'shield' => false,
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
            'form.strength' => 'required|numeric|min:1|max:9999',
            'form.dexterity' => 'required|numeric|min:1|max:9999',
            'form.constitution' => 'required|numeric|min:1|max:9999',
            'form.intelligence' => 'required|numeric|min:1|max:9999',
            'form.wisdom' => 'required|numeric|min:1|max:9999',
            'form.charisma' => 'required|numeric|min:1|max:9999',
            'form.height' => 'required|numeric|min:1|max:9999',
            'form.weight' => 'required|numeric|min:1|max:9999',
            'form.health' => 'required|numeric|min:1|max:9999',
            'form.level' => 'required|numeric|min:1|max:9999',
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
        return CharacterService::getCharacterTypes();
    }

    #[Computed()]
    public function races()
    {
        return RaceService::getRaces();
    }

    #[Computed()]
    public function genres()
    {
        return CharacterService::getGenres();
    }

    #[Computed()]
    public function weapons()
    {
        return WeaponService::getWeapons($this->form['characterTypeId']);
    }

    #[Computed()]
    public function armor()
    {
        return Armors::armorByCharacterType($this->form['characterTypeId']);
    }

    #[Computed()]
    public function armorLabel()
    {
        return __('characters.armors.'.$this->armor->label);
    }

    public function updatedForm($value, $key)
    {
        if ($key === 'characterTypeId') {
            $this->form['weaponId'] = null;
            $this->form['armorId'] = $this->armor->value;
            $this->show = Weapons::showShield($this->form['weaponId']);
        }

        if ($key === 'weaponId') {
            $this->form['shield'] = false;
            $this->show = Weapons::showShield($this->form['weaponId']);
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
            $this->dispatch('refresh');
            $this->dispatch('resetAll');
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
