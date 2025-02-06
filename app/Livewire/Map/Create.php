<?php

namespace App\Livewire\Map;

use App\Http\Services\MapService;
use App\Models\Map;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use WireUiActions, WithFileUploads;

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

    public function mount()
    {
        $this->resetValidation();
    }

    public function create()
    {
        $this->validate();

        $response = MapService::create($this->form);

        if ($response instanceof Map) {
            $this->dispatch('closePanel');
            $this->reset();
            $this->resetValidation();
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('maps.actions.create.form.success.title'),
                'description' => __('maps.actions.create.form.success.description'),
            ]);
            $this->dispatch('refresh');
            $this->dispatch('resetAll');
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('maps.actions.create.form.error.title'),
                'description' => __('maps.actions.create.form.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.map.create');
    }
}
