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

    public function clearFilters()
    {
        $this->dispatch('resetDateTimePicker');
        $this->search = '';
        $this->reset();
        $this->resetPage($this->paginators);
        $this->dispatch('resetAll');
    }
}
