<div class="space-y-4">
    <div class="space-y-4 overflow-x-auto">
        <div class="space-y-4">
            <h1 class="font-bold">{{ __('characters.filters.title') }}</h1>
            <div class="flex flex-col gap-4 md:flex-row" x-data="filterForm()" x-ref="filterForm">
                <input type="text" placeholder="{{ __('characters.filters.search.placeholder') }}"
                    class="w-full max-w-xs input input-bordered" wire:model.live="search" />
                <x-livewire.select :data="$this->races" label="{{ __('characters.filters.races.select') }}"
                    filter="race" />
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
        <table class="table text-center border border-base-content/30">
            <thead>
                <tr class="border border-base-content/30" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('characters.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.theading :label="__('characters.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('nickname')">
                        <x-livewire.theading :label="__('characters.table.nickname')" id="nickname" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('race')">
                        <x-livewire.theading :label="__('characters.table.race')" id="race" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('gender')">
                        <x-livewire.theading :label="__('characters.table.gender')" id="gender" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('characterType')">
                        <x-livewire.theading :label="__('characters.table.character_type')" id="characterType" />
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->characters as $character)
                    <tr class="border border-base-content/30">
                        <td class="space-y-2 md:space-x-2">
                            <x-button icon="chart-bar" rounded class="bg-base-100" primary />
                            <x-button icon="information-circle" rounded class="bg-base-100" info />
                            <x-button icon="trash" rounded class="bg-base-100" negative
                                wire:click="confirm({{ $character->id }})" />
                        </td>
                        <td>{{ $character->name }}</td>
                        <td>{{ $character->nickname }}</td>
                        <td>{{ __('characters.races.' . Str::lower(Str::snake($character->race))) }}</td>
                        <td>{{ $character->gender }}</td>
                        <td>
                            <p class="rounded-full tooltip"
                                data-tip="{{ __('characters.characters_types.' . Str::lower(Str::snake($character->characterType->type))) }}">
                                <img src="{{ $character->characterType->image }}"
                                    alt="{{ __('characters.characters_types.image') }}" class="w-12 h-12 rounded-full">
                            </p>
                        </td>
                    </tr>
                @empty
                    <tr class="font-bold border border-base-content/30">
                        <td colspan="7">{{ __('characters.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->characters" :count="$this->characters->count()" />
</div>
