<?php

namespace App\Livewire\User;

use App\Http\Services\UserService;
use App\Livewire\Layout\Header;
use Auth;
use Carbon\Carbon;
use DateTimeZone;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class Info extends Component
{
    use WireUiActions, WithFileUploads;

    public array $form = [
        'name' => null,
        'password' => null,
        'email' => null,
        'timezone' => null,
        'avatar' => null,
        'email_verified_at' => null,
    ];

    public $avatar = null; // This variable is used to the input hidden

    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.email' => 'required|email|unique:users,email,' . $this->user->id,
            'form.timezone' => 'required',
            'form.avatar' => 'nullable|image',
            'form.email_verified_at' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->resetValidation();
        $this->form['name'] = $this->user->name;
        $this->form['email'] = $this->user->email;
        $this->form['timezone'] = [
            'id' => $this->getTimeZone(name: $this->user->timezone)['id'],
            'name' => $this->user->timezone,
        ];
        $this->avatar = $this->user->avatar;
        $this->form['email_verified_at'] = $this->user->email_verified_at;
    }

    #[Computed()]
    public function user()
    {
        return UserService::getUser(Auth::id());
    }

    #[Computed()]
    public function userTimeZone()
    {
        return (new Carbon(timezone: $this->user->timezone))->toDateTimeString();
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

    #[Computed()]
    public function emailVerifiedIcon()
    {
        return $this->user->email_verified_at ? [
            'value' => 'heroicon-s-check-circle',
            'class' => 'w-5 h-5 text-green-500',
            'data-tip' => __('users.table.email_verified'),
        ] : [
            'value' => 'heroicon-s-x-circle',
            'class' => 'w-5 h-5 text-red-500',
            'data-tip' => __('users.table.email_not_verified'),
        ];
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
        $response = UserService::remove($id);

        if ($response) {
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

    public function updatedForm($value, $key)
    {
        if ($key === 'avatar') {
            $this->avatar = $this->form[$key];
        }

        if ($key === 'timezone') {
            $this->form['timezone'] = $this->getTimeZone(id: $value);
        }
    }

    private function getTimeZone(?int $id = null, ?string $name = null)
    {
        return $this->timezones()->filter(function ($timezone) use ($id, $name) {
            return ($id !== null && $name !== null && $timezone['id'] === $id && $timezone['name'] === $name) ||
                ($id !== null && $timezone['id'] === $id) ||
                ($name !== null && $timezone['name'] === $name);
        })->first();
    }

    public function update()
    {
        $this->validate();
        $response = UserService::update($this->user->id, $this->form);

        if ($response) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('users.actions.update.form.success.title'),
                'description' => __('users.actions.update.form.success.description'),
            ]);
            $this->dispatch('refresh')->to(Header::class);
            $this->dispatch('refresh')->to(Info::class);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('users.actions.update.form.error.title'),
                'description' => __('users.actions.update.form.error.description'),
            ]);
        }
    }

    #[On('refresh')]
    public function refresh() {}

    public function render()
    {
        return view('livewire.user.info');
    }
}
