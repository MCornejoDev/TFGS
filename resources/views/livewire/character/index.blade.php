<div class="space-y-4">
    <div class="flex items-center justify-end gap-4">
        <x-livewire.filters.index title="{{ __('characters.filters.title') }}" :filters="$this->allFilters()"
            labelLoading="{{ __('characters.filters.actions.loading') }}"
            labelClear="{{ __('characters.filters.actions.clear') }}" />
        <x-button icon="user-plus" label="{{ __('characters.actions.create.btn') }}"
            class="!btn !border-base-content/30 !outline-none" wire:click='openSidePanel' />
    </div>

    <div class="space-y-4 overflow-x-auto">
        <table class="table text-center border border-base-content/30">
            <thead>
                <tr class="border border-base-content/30" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('characters.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.tables.theading :label="__('characters.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('nickname')">
                        <x-livewire.tables.theading :label="__('characters.table.nickname')" id="nickname" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('race')">
                        <x-livewire.tables.theading :label="__('characters.table.race')" id="race" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('gender')">
                        <x-livewire.tables.theading :label="__('characters.table.gender')" id="gender" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('character_type_id')">
                        <x-livewire.tables.theading :label="__('characters.table.character_type')" id="character_type_id" />
                    </th>
                    <th class="font-bold cursor-pointer text-md">
                        <x-livewire.tables.theading :label="__('characters.table.armor_weapon')" />
                    </th>
                </tr>
            </thead>
            <tbody wire:init="loadRecords">
                <x-livewire.tables.trloading wire-target="loadRecords" :label="__('characters.filters.actions.loading')" :colspan="7" />

                @forelse ($this->characters as $character)
                    <tr class="border border-base-content/30" wire:loading.remove wire:target="loadRecords">
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
                    <tr class="font-bold border border-base-content/30" wire:loading.remove wire:target="loadRecords">
                        <td colspan="6" class="py-4 text-center">{{ __('characters.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->characters" :count="$this->characters->count()" />
</div>
