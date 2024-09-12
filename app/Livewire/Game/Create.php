<?php

namespace App\Livewire\Game;

use App\Http\Services\GameService;
use App\Livewire\Traits\DateTime;
use App\Models\Game;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use DateTime, WireUiActions;

    public array $form = [
        'name' => null,
        'date_start' => null,
        'comments' => null,
        'users' => null,
    ];

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.date_start' => 'required',
            'form.comments' => 'required',
        ];
    }

    public function mount()
    {
        $this->resetValidation();
    }

    #[Computed()]
    public function users()
    {
        return User::select(['id', 'name'])->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        })->sortBy('name')->values();
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
            $this->dispatch('refresh');
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
