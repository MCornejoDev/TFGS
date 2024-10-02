<?php

namespace App\Livewire\Character;

use App\Http\Services\CharacterService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Info extends Component
{
    public int $id;

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

    public function render()
    {
        return view('livewire.character.info');
    }
}
