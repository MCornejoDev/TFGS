@props([
    'title' => null,
    'filters' => [],
    'labelClear' => null,
    'labelLoading' => null,
])

<div class="flex items-center justify-end">

    <div x-data="{ open: false }" class="relative">
        <x-button @click="open = !open" icon="funnel" label="{{ $title }}"
            class="!btn !border-base-content/30 !outline-none" />

        <div x-show="open" @click.away="open = false"
            class="absolute right-0 z-10 mt-2 border rounded shadow-lg w-72 bg-base-100 md:w-96 border-base-content/30">
            <div class="p-4 space-y-4" x-data="filterForm()" x-ref="filterForm">
                <h1 class="flex items-center gap-2 font-bold"><x-icon name="funnel" class="w-5 h-5" />
                    {{ $title }}</h1>
                <div class="flex flex-col gap-4">

                    @foreach ($filters as $filter)
                        @switch($filter['type'])
                            @case('select')
                                <x-livewire.forms.select :items="$filter['data']" placeholder="{{ $filter['placeholder'] }}"
                                    model="{{ $filter['filter'] }}" optionId="id" optionLabel="name" isFilter="true"
                                    isMultiple="{{ $filter['isMultiple'] ?? false }}" />
                            @break

                            @case('date')
                                <x-livewire.forms.datetime-picker :model="$filter['model']" wire:key="{{ $filter['model'] }}"
                                    placeholder="{{ $filter['placeholder'] }}" />
                            @break

                            @default
                                <input type="text" placeholder="{{ $filter['label'] }}"
                                    class="w-full border-base-300 bg-base-300 input input-bordered placeholder:text-sm placeholder:font-bold !h-auto"
                                    wire:model.live="search" />
                        @endswitch
                    @endforeach
                    <x-livewire.forms.button title="{{ $labelClear }}" action="clearFilters"
                        class="w-full font-bold btn input-bordered md:w-auto" />
                </div>
            </div>
        </div>
    </div>
</div>
