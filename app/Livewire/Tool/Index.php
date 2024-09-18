<?php

namespace App\Livewire\Tool;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{

    public $die;

    #[Computed()]
    public function toolTypes()
    {
        return collect([
            [
                'id' => 1,
                'name' => __('tools.types.6D'),
            ],
            [
                'id' => 2,
                'name' => __('tools.types.18D'),
            ],
            [
                'id' => 3,
                'name' => __('tools.types.30D'),
            ],
            [
                'id' => 4,
                'name' => __('tools.types.60D'),
            ],
            [
                'id' => 5,
                'name' => __('tools.types.coin'),

            ]
        ])->sortBy('name')->values();
    }

    public function render()
    {
        return view('livewire.tool.index');
    }
}
