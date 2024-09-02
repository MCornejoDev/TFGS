<?php

namespace App\Livewire\Character;

use App\Enums\Armors;
use App\Enums\CharacterTypes;
use App\Enums\Races;
use App\Enums\Weapons;
use App\Models\Character;
use App\Models\Game;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Str;

class Create extends Component
{

    public array $form = [
        'gameId' => null,
        'characterTypeId' => null,
        'weaponId' => null,
        'raceId' => null,
        'gender' => null,
        'age' => null,
        'name' => null,
        'nickname' => null,
    ];

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
        ], CharacterTypes::toValues(), CharacterTypes::withTranslations());
    }

    #[Computed()]
    public function races()
    {
        return array_map(fn($key, $value) => [
            'id' => $key,
            'name' => $value,
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
        $weaponsByCharacterType = $this->form['characterTypeId'] ? Weapons::weaponByCharacterType(Str::lower(CharacterTypes::tryFrom($this->form['characterTypeId'])->label)) : [];

        return collect($weaponsByCharacterType)->map(function ($weapon, $key) {
            return [
                'id' => $key,
                'name' => __('characters.weapons.' . Str::snake(Str::lower($weapon))),
            ];
        })->toArray();
    }

    #[Computed()]
    public function armor()
    {
        return $this->form['characterTypeId'] ? Armors::armorByCharacterType(Str::lower(CharacterTypes::tryFrom($this->form['characterTypeId'])->label)) : "";
    }

    public function updatedCharacterTypeId()
    {
        $this->form['weaponId'] = null;
    }

    public function create()
    {
        $this->validate([
            'form.gameId' => 'required',
            'form.characterTypeId' => 'required',
            'form.raceId' => 'required',
            'form.gender' => 'required',
            'form.age' => 'required|numeric',
            'form.name' => 'required',
            'form.nickname' => 'required',
            'form.weaponId' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.character.create');
    }
}
