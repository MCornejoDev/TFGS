<?php

namespace App\Livewire\Layout;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Livewire\Component;

class Header extends Component
{

    public function logout()
    {
        (new AuthenticatedSessionController())->destroy(request());
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
