<?php

namespace App\Livewire;

use App\Http\Services\CharacterService;
use App\Http\Services\GameService;
use App\Models\Character;
use App\Models\User;
use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Welcome extends Component
{
    #[Computed()]
    public function user()
    {
        return Auth::user();
    }

    #[Computed()]
    public function games()
    {
        return $this->user->games()
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();;
    }

    #[Computed()]
    public function characters()
    {
        return Character::with('characterType')
            ->where('user_id', $this->user->id)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
    }

    #[Computed()]
    public function charactersCount()
    {
        return $this->user->games()
            ->withCount('characters')
            ->get()
            ->sum('characters_count');
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
