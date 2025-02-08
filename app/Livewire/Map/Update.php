<?php

namespace App\Livewire\Map;

use App\Http\Services\MapService;
use App\Models\Map;
use Livewire\Component;

class Update extends Component
{
    public Map $map;

    public function mount(int $id)
    {
        $this->map = MapService::getMapById($id);
    }

    public function render()
    {
        return view('livewire.map.update');
    }
}
