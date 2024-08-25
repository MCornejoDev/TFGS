<div class="space-y-4">
    <div class="space-y-4">
        <h1>{{ __('characters.filters.title') }}</h1>
        <div class="grid gap-4 justify-items-center md:grid-cols-3 lg:grid-cols-6" x-data="filterForm()">
            <input type="text" placeholder="{{ __('characters.filters.search.placeholder') }}"
                class="w-full max-w-xs input input-bordered" wire:model.live="search" />
            <x-livewire.select :data="$this->races" label="{{ __('characters.filters.races.select') }}" filter="race" />
            <x-livewire.select :data="$this->characterTypes" label="{{ __('characters.filters.characters_types.select') }}"
                filter="characterType" />
            <x-livewire.select :data="$this->genders" label="{{ __('characters.filters.genders.select') }}"
                filter="gender" />

            <button class="btn input-bordered" x-on:click="clearFilters">
                <div x-show="loading" class="flex items-center gap-2">
                    <span class="w-5 loading loading-spinner"></span>
                    <span> {{ __('characters.filters.actions.loading') }}</span>
                </div>
                <div x-show="!loading">{{ __('characters.filters.actions.clear') }}</div>
            </button>
        </div>
    </div>

    <div @class([
        'grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4' =>
            $this->characters->count() > 0,
        'grid grid-cols-1 gap-4 justify-items-center font-bold' =>
            $this->characters->count() === 0,
    ])>
        @forelse ($this->characters as $character)
            <div class="max-[320px]:w-72 w-80 lg:shadow-xl card bg-base-100 lg:w-80 gap-4">
                <div class="flex items-center justify-between">
                    <p class="font-bold">{{ $character->name }}</p>
                    <x-dropdown class="font-bold" position="bottom-end">
                        <x-dropdown.item icon="chart-bar" label="{{ __('characters.actions.history.title') }}"
                            class="!text-primary-500 hover:!bg-primary-500 hover:!text-white" />
                        <x-dropdown.item icon="information-circle"
                            label="{{ __('characters.actions.information.title') }}"
                            class="!text-info-500 hover:!bg-blue-500 hover:!text-white" />
                        <x-dropdown.item icon="trash" label="{{ __('characters.actions.delete.btn') }}"
                            class="!text-red-500 hover:!bg-red-500 hover:!text-white"
                            wire:click="confirm({{ $character->id }})" />
                    </x-dropdown>
                </div>
                <div>
                    <figure class="px-10">
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                            alt="Shoes" class="rounded-xl" />
                    </figure>
                    <div class="items-center text-center card-body">
                        <p>{{ $character->nickname }}</p>
                        <p class="text-sm">{{ __('characters.races.' . Str::lower(Str::snake($character->race))) }}</p>
                        <p>{{ $character->gender }}</p>
                        <p>{{ __('characters.characters_types.' . Str::lower(Str::snake($character->characterType->type))) }}
                        </p>
                        <p class="rounded-full ">
                            <img src="{{ $character->characterType->image }}"
                                alt="{{ __('characters.characters_types.image') }}" class="w-16 h-16 rounded-full">
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center">
                {{ __('characters.empty') }}
            </div>
        @endforelse
    </div>
    <x-livewire.pagination :items="$this->characters" :count="4" />
</div>
