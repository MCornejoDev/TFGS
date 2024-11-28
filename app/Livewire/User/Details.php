<?php

namespace App\Livewire\User;

use App\Http\Services\UserService;
use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Details extends Component
{
    use WireUiActions;

    public array $form = [
        'name' => null,
        'password' => null,
        'email' => null,
        'timezone' => null,
        'avatar' => null,
    ];

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.password' => 'required',
            'form.email' => 'required',
            'form.timezone' => 'required',
            'form.avatar' => 'required',
        ];
    }

    public function mount()
    {
        $this->resetValidation();
    }

    #[Computed()]
    public function user()
    {
        return UserService::getUser(Auth::id());
    }

    public function remove() {}

    public function render()
    {
        return view('livewire.user.details');
    }
}
