<?php

namespace App\Livewire\Character;

use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Info extends Component
{
    public int $id;

    public function mount()
    {
        $this->dispatch('chartInit');
    }

    #[Computed()]
    public function character()
    {
        return CharacterService::getCharacter($this->id);
    }

    #[Computed()]
    public function chart()
    {
        return [
            'type' => 'line',
            'data' => [
                'labels' => CharacterService::getLabels($this->character->id),
                'datasets' => CharacterService::getDataSets($this->character->id),
            ],
            'options' => $this->chartOptions,
        ];
    }

    #[Computed()]
    public function chartOptions()
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'stacked' => true,
                    'grid' => [
                        'display' => true,
                        'color' => 'rgba(255,99,132,0.2)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }

    public function openSidePanel(): void
    {
        $this->dispatch(
            'openPanel',
            title: __('characters.actions.update.title'),
            component: 'character.update',
            icon: 'user-plus',
            params: [
                'character' => $this->character,
            ]
        );
    }

    #[On('refresh')]
    public function refresh(): void
    {
        //TODO: esto no actualiza correctamente (da error max call stack size exceeded)
        $this->dispatch('updatingChart', $this->chart['data']['datasets']);
    }

    public function getTranslation($keyPart, $keyValue)
    {
        return __($keyPart . snake_lower($keyValue));
    }

    public function render()
    {
        return view('livewire.character.info');
    }
}
