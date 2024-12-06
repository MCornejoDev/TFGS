<?php

namespace App\Livewire\Traits;

trait ResetsPage
{
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }
}
