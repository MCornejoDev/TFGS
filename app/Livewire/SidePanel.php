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

    public array $params = [];

    public string $componentKey = '';


    #[On('openPanel')]
    public function openPanel(string $title, string $component, string $icon = '', array $params = []): void
    {
        $this->reset();
        $this->open = true;
        $this->title = $title;
        $this->component = $component;
        $this->icon = $icon;
        $this->params = $params;
        $this->componentKey = md5($component . json_encode($params));
    }

    #[On('closePanel')]
    public function closePanel(): void
    {
        $this->open = false;
    }

    public function render(): ViewContract
    {
        return View::make(
            view: 'livewire.side-panel',
        );
    }
}
