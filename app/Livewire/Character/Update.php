<?php

namespace App\Livewire\Character;

use Livewire\Component;

class Update extends Component
{
    public array $character;

    public array $form = [
        'age' => null,
        'level' => null,
        'health' => null,
        'height' => null,
        'weight' => null,
        'skills' => [],
        'strength' => null,
        'dexterity' => null,
        'constitution' => null,
        'intelligence' => null,
        'wisdom' => null,
        'charisma' => null
    ];

    public function rules()
    {
        return [
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
        $this->form['age'] = $this->character['age'];
        $this->form['level'] = $this->character['level'];
        $this->form['health'] = $this->character['health'];
        $this->form['height'] = $this->character['height'];
        $this->form['weight'] = $this->character['weight'];
        $this->form['skills'] = $this->character['skills'];
        $this->form['strength'] = $this->character['strength'];
        $this->form['dexterity'] = $this->character['dexterity'];
        $this->form['constitution'] = $this->character['constitution'];
        $this->form['intelligence'] = $this->character['intelligence'];
        $this->form['wisdom'] = $this->character['wisdom'];
        $this->form['charisma'] = $this->character['charisma'];
    }

    public function update()
    {
        $this->validate();
        $this->dispatch('chartUpdated');
    }

    public function render()
    {
        return view('livewire.character.update');
    }
}
