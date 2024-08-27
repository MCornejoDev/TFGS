<div class="flex items-center justify-end">

    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="btn btn-primary">
            {{ $title }}
        </button>

        <div x-show="open" @click.away="open = false"
            class="absolute right-0 z-10 mt-2 border rounded shadow-lg w-72 bg-base-100 md:w-96 border-base-content/30">
            <div class="p-4 space-y-4" x-data="filterForm()" x-ref="filterForm">
                <h1 class="font-bold">{{ $title }}</h1>
                <div class="flex flex-col gap-4">

                    @foreach ($filters as $filter)
                        @switch($filter['type'])
                            @case('select')
                                <x-livewire.filters.select :data="$filter['data']" label="{{ $filter['label'] }}"
                                    filter="{{ $filter['filter'] }}" />
                            @break

                            @default
                                <input type="text" placeholder="{{ $filter['label'] }}" class="w-full input input-bordered"
                                    wire:model.live="search" />
                        @endswitch
                    @endforeach

                    <button type="button" class="w-full btn input-bordered md:w-auto" x-on:click="clearFilters">
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
