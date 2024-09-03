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
                                <x-livewire.filters.select :data="$filter['data']" label="{{ $filter['label'] ?? '' }}"
                                    filter="{{ $filter['filter'] }}" />
                            @break

                            @case('date')
                                <x-datetime-picker wire:model.live="filters.{{ $filter['model'] }}"
                                    placeholder="{{ $filter['placeholder'] }}" class="font-bold text-base-content/30"
                                    class="datePicker" />
                            @break

                            @default
                                <input type="text" placeholder="{{ $filter['label'] }}"
                                    class="w-full input input-bordered placeholder:text-sm placeholder:font-bold"
                                    wire:model.live="search" />
                        @endswitch
                    @endforeach

                    {{-- <x-button x-on:click="clearFilters" spinner="$wire.entangle('loading')"
                        label="{{ $labelClear }}" /> --}}

                    <button type="button" class="w-full font-bold btn input-bordered md:w-auto"
                        x-on:click="clearFilters">
                        <div x-show="loading" class="flex items-center gap-2">
                            <span class="w-5 loading loading-spinner"></span>
                            <span>{{ $labelLoading }}</span>
                        </div>
                        <div x-show="!loading">{{ $labelClear }}</div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
