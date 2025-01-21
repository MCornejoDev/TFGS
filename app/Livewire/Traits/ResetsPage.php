<?php

namespace App\Livewire\Traits;

trait ResetsPage
{
    public function updatedSearch()
    {
        $this->resetCustomPages();
        $this->resetPage();
    }

    public function updatedFilters()
    {
        $this->resetCustomPages();
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->dispatch('resetDateTimePicker');
        $this->search = '';
        $this->reset();
        $this->resetCustomPages();
        $this->resetPage();
        $this->dispatch('resetAll');
    }

    public function resetCustomPages()
    {
        foreach ($this->paginators as $key => $paginators) {
            $this->resetPage($key);
        }
    }
}
