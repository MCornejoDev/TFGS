<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="items-center gap-12 p-8 pt-0 space-y-4 text-center border border-base-content/30">

    </div>
    <div>
        <table class="table text-center border border-base-content/30">
            <thead>
                <tr class="border border-base-content/30" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('characters.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('level')">
                        <x-livewire.tables.theading :label="__('characters.table.level')" id="level" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.tables.theading :label="__('characters.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('race')">
                        <x-livewire.tables.theading :label="__('characters.table.race')" id="race" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('character_type_id')">
                        <x-livewire.tables.theading :label="__('characters.table.character_type')" id="character_type_id" />
                    </th>
                    <th class="font-bold text-md">
                        <x-livewire.tables.theading :label="__('characters.table.armor_weapon')" />
                    </th>
                    <th class="font-bold text-md">
                        <x-livewire.tables.theading :label="'User'" />
                    </th>
                </tr>
            </thead>
            <tbody wire:init="loadRecords">
                <x-livewire.tables.trloading wire-target="loadRecords" :label="__('characters.filters.actions.loading')" :colspan="7" />
                @forelse ($this->characters as $character)
                    <tr class="table-row border border-base-content/30" wire:loading.class="hidden"
                        wire:target="loadRecords">

                        <td class="space-y-2">
                            <x-button icon="information-circle" rounded class="bg-base-100" info
                                href="{{ route('characters.info', ['id' => $character->id]) }}" wire:navigate />
                        </td>
                        <td class="font-bold">
                            <x-avatar md>
                                <x-slot name="label" class="!text-black !font-extrabold italic">
                                    {{ $character->level }}
                                </x-slot>
                            </x-avatar>
                        </td>
                        <td class="font-bold">
                            <div>{{ $character->name }}</div>
                            <div class="text-xs cursor-pointer text-base-content/70 tooltip tooltip-left"
                                data-tip="{{ __('characters.table.nickname') }}">({{ $character->nickname }})</div>
                        </td>
                        <td>
                            <x-livewire.labels.images :dataTip="__('characters.races.' . snake_lower($character->raceLabel))" :src="$character->raceImage" :alt="__('characters.races.image')" />
                        </td>
                        <td>
                            <x-livewire.labels.images :dataTip="__(
                                'characters.characters_types.' . snake_lower($character->characterType->typeLabel),
                            )" :src="$character->characterType->image" :alt="__('characters.characters_types.image')" />
                        </td>
                        <td>
                            <x-livewire.labels.images :dataTip="__('characters.armors.' . snake_lower($character->characterType->armorLabel))" :src="$character->characterType->armorImage" :alt="__('characters.armors.image')" />
                            <x-livewire.labels.images :dataTip="__('characters.weapons.' . snake_lower($character->characterType->weaponLabel))" :src="$character->characterType->weaponImage" :alt="__('characters.weapons.image')" />
                        </td>
                        <td>
                            <x-avatar md src="{{ $character->user->avatarImage }}"
                                alt="{{ $character->user->avatarLabel }}" />
                        </td>

                    </tr>
                @empty
                    <tr class="font-bold border border-base-content/30" wire:loading.remove wire:target="loadRecords">
                        <td colspan="7" class="py-4 text-center">{{ __('characters.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <x-livewire.pagination :items="$this->characters" />
    </div>

</div>
