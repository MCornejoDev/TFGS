<?php

namespace App\Livewire\Layout;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Services\UserService;
use Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public function redirectToHomePage()
    {
        redirect()->route('home');
    }

    public function logout()
    {
        (new AuthenticatedSessionController)->destroy(request());
    }

    #[Computed()]
    public function user()
    {
        return UserService::getUser(Auth::id());
    }

    #[On('refresh')]
    public function refresh() {}

    public function render()
    {
        return view('livewire.layout.header');
    }
}
