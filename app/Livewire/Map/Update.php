<?php

namespace App\Livewire\Map;

use App\Http\Services\MapService;
use App\Models\Map;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class Update extends Component
{
    use WireUiActions, WithFileUploads;

    public Map $map;

    public array $form = [
        'name' => null,
        'image' => null,
    ];

    public function rules()
    {
        return [
            'form.name' => 'nullable',
            'form.image' => 'required|image|max:1024',
        ];
    }

    public function mount(int $id)
    {
        $this->resetValidation();
        $this->map = MapService::getMapById($id);
        $this->form['name'] = $this->map->name;
        $this->form['image'] = $this->map->link;
    }

    public function update()
    {
        $this->validate();
        $response = MapService::updateMap($this->map->id, $this->form);

        if ($response) {
            $this->dispatch('closePanel');
            $this->reset();
            $this->resetValidation();
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('maps.actions.update.form.success.title'),
                'description' => __('maps.actions.update.form.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('maps.actions.update.form.error.title'),
                'description' => __('maps.actions.update.form.error.description'),
            ]);
        }
        $this->dispatch('refresh')->to(Index::class);
    }

    public function render()
    {
        return view('livewire.map.update');
    }
}
