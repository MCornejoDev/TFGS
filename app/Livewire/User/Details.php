<?php

namespace App\Livewire\User;

use App\Http\Services\UserService;
use Auth;
use DateTimeZone;
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
        $this->form['name'] = $this->user->name;
        $this->form['email'] = $this->user->email;
        $this->form['timezone'] = [
            'id' => $this->timezones()->filter(fn($timezone) => $timezone['name'] === $this->user->timezone)->first()['id'],
            'name' => $this->user->timezone,
        ];
        $this->form['avatar'] = $this->user->avatar;
    }

    #[Computed()]
    public function user()
    {
        return UserService::getUser(Auth::id());
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

    public function confirm()
    {
        $this->dialog()->confirm([
            'title' => __('users.actions.delete.title'),
            'description' => __('users.actions.delete.description'),
            'icon' => 'trash',
            'accept' => [
                'label' => __('users.actions.delete.accept'),
                'method' => 'remove',
                'params' => $this->user->id,
                'class' => 'bg-red-500 text-white hover:bg-red-600 hover:text-white',
            ],
            'reject' => [
                'label' => __('users.actions.delete.reject'),
            ],
        ]);
    }

    public function remove(int $id)
    {
        $result = UserService::remove($id);

        if ($result) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('users.actions.delete.success.title'),
                'description' => __('users.actions.delete.success.description'),
            ]);
            redirect('home');
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('users.actions.delete.error.title'),
                'description' => __('users.actions.delete.error.description'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.details');
    }
}
