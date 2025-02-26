<?php

namespace App\Livewire\User;

use App\Http\Services\UserService;
use Carbon\Carbon;
use DateTimeZone;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class Create extends Component
{
    use WireUiActions, WithFileUploads;

    public array $form = [
        'name' => null,
        'email' => null,
        'email_verified_at' => null,
        'password' => null,
        'timezone' => null,
        'avatar' => null,
        'is_admin' => null,
    ];

    public $avatar = null; // This variable is used to the input hidden

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.email' => 'required|email|unique:users,email',
            'form.password' => 'required|min:6',
            'form.timezone' => 'required',
            'form.avatar' => 'nullable|image',
            'form.email_verified_at' => 'nullable',
        ];
    }

    #[Computed()]
    public function timezones()
    {
        return collect(DateTimeZone::listIdentifiers())->map(function ($timezone, $index) {
            return [
                'id' => $index,
                'name' => $timezone,
            ];
        })->sortBy('name')->values();
    }

    public function create()
    {
        $this->validate();
        $response = UserService::create($this->form);

        if ($response) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('users.actions.create.form.success.title'),
                'description' => __('users.actions.create.form.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('users.actions.create.form.error.title'),
                'description' => __('users.actions.create.form.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
