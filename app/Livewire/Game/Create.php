<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use App\Models\Game;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use WireUiActions;

    public array $form = [
        'name' => null,
        'date_start' => null,
        'comments' => null,
        'users' => [],
    ];

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.date_start' => 'required',
            'form.comments' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();

        $response = GameService::create($this->form);

        if ($response instanceof Game) {
            $this->dispatch('closePanel');
            $this->reset();
            $this->resetValidation();
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('games.actions.create.form.success.title'),
                'description' => __('games.actions.create.form.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('games.actions.create.form.error.title'),
                'description' => __('games.actions.create.form.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.game.create');
    }
}
