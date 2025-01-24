<div class="space-y-4">
    <div class="flex items-center justify-end gap-4">
        <x-livewire.filters.index title="{{ __('games.filters.title') }}" :filters="$this->allFilters()"
            labelLoading="{{ __('games.filters.actions.loading') }}"
            labelClear="{{ __('games.filters.actions.clear') }}" />
        <x-button icon="squares-plus" label="{{ __('games.actions.create.btn') }}"
            class="!btn !border-base-content/30 !outline-none" wire:click='openSidePanel' />
    </div>
    <div class="overflow-x-auto">
        <table class="table text-center shadow bg-base">
            <thead>
                <tr class="" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('games.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.tables.theading :label="__('games.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('description')">
                        <x-livewire.tables.theading :label="__('games.table.description')" id="description" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('date_start')">
                        <x-livewire.tables.theading :label="__('games.table.date_start')" id="date_start" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('comments')">
                        <x-livewire.tables.theading :label="__('games.table.comments')" id="comments" />
                    </th>
                    <th class="font-bold text-md">{{ __('games.table.users') }}</th>
                </tr>
            </thead>
            <tbody wire:init="loadRecords">
                <x-livewire.tables.trloading wire-target="loadRecords" :label="__('games.filters.actions.loading')" :colspan="6" />
                @forelse ($this->games as $game)
                    <tr class="table-row" wire:loading.class="hidden" wire:target="loadRecords">
                        <td class="space-y-2">
                            <x-button icon="chart-bar" rounded class="bg-base-100" primary />
                            <x-button icon="information-circle" rounded class="bg-base-100" info
                                href="{{ route('games.info', ['id' => $game->id]) }}" wire:navigate />
                            <x-button icon="trash" rounded class="bg-base-100" negative
                                wire:click="confirm({{ $game->id }})" />
                        </td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->description }}</td>
                        <td>{{ $game->date_start }}</td>
                        <td>{{ $game->comments }}</td>
                        <td>
                            <div class="flex items-center justify-center -space-x-4">
                                @foreach ($game->users->take($this->playersToShow) as $user)
                                    <x-avatar md src="{{ $user->avatarImage }}" alt="{{ $user->avatarLabel }}" />
                                @endforeach
                                @if ($game->users->count() > $this->playersToShow)
                                    <x-avatar md>
                                        <x-slot name="label" class="!text-black !font-extrabold italic">
                                            +{{ $game->users->count() - $this->playersToShow }}
                                        </x-slot>
                                    </x-avatar>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="font-bold" wire:loading.remove wire:target="loadRecords">
                        <td colspan="6" class="py-4 text-center">{{ __('games.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->games" :count="$this->games->count()" />
</div>
