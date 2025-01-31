<div class="grid grid-cols-1 gap-4 lg:grid-cols-[1fr_2fr]">
    <!-- Información del juego -->
    <div class="flex flex-col p-6 space-y-4 text-white rounded-lg shadow-md bg-base md:h-fit">
        <div class="flex flex-col gap-4">
            <div>
                <span class="font-bold text-base-content/70">{{ __('games.table.name') }}: </span>
                <span class="text-base-content/70">{{ $this->game->name }}</span>
            </div>
            <div>
                <span class="font-bold text-base-content/70">{{ __('games.table.date_start') }}: </span>
                <span class="text-base-content/70">{{ $this->game->date_start }}</span>
            </div>
            <div>
                <span class="font-bold text-base-content/70">{{ __('games.table.description') }}: </span>
                <span class="text-base-content/70">{{ $this->game->description }}</span>
            </div>
            <div>
                <span class="font-bold text-base-content/70">{{ __('games.table.comments') }}: </span>
                <span class="text-base-content/70">{{ $this->game->comments }}</span>
            </div>
        </div>
    </div>

    <div>
        <!-- Tabla de personajes -->
        <div class="flex-grow space-y-4 overflow-auto">
            <table class="table w-full text-center rounded shadow bg-base">
                <thead>
                    <tr class="" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
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
                            <x-livewire.tables.theading :label="__('characters.table.user')" />
                        </th>
                    </tr>
                </thead>
                <tbody wire:init="loadRecords">
                    <x-livewire.tables.trloading wire-target="loadRecords" :label="__('characters.filters.actions.loading')" :colspan="7" />
                    @forelse ($this->characters as $character)
                        <tr class="table-row" wire:loading.class="hidden" wire:target="loadRecords">
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
                                    data-tip="{{ __('characters.table.nickname') }}">({{ $character->nickname }})
                                </div>
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
                                <x-livewire.labels.images :dataTip="__(
                                    'characters.armors.' . snake_lower($character->characterType->armorLabel),
                                )" :src="$character->characterType->armorImage" :alt="__('characters.armors.image')" />
                                <x-livewire.labels.images :dataTip="__(
                                    'characters.weapons.' . snake_lower($character->characterType->weaponLabel),
                                )" :src="$character->characterType->weaponImage" :alt="__('characters.weapons.image')" />
                            </td>
                            <td>
                                <x-livewire.labels.images :dataTip="$character->user->name" :src="$character->user->avatarImage" :alt="$character->user->avatarLabel" />
                            </td>
                        </tr>
                    @empty
                        <tr class="font-bold" wire:loading.remove wire:target="loadRecords">
                            <td colspan="7" class="py-4 text-center">{{ __('characters.empty') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <x-livewire.pagination :items="$this->characters" />
    </div>
</div>
