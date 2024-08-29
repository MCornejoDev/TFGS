<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\On;
use Livewire\Component;

final class SidePanel extends Component
{
    public bool $open = false;
    public string $title = 'Default Panel';
    public string $component = '';
    public string $icon = '';

    #[On('openPanel')]
    public function openPanel(string $title, string $component, string $icon = ''): void
    {
        $this->open = true;
        $this->title = $title;
        $this->component = $component;
        $this->icon = $icon;
    }

    public function render(): ViewContract
    {
        return View::make(
            view: 'livewire.side-panel',
        );
    }
}
