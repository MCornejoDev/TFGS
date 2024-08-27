<div class="space-y-4">
    <div class="overflow-x-auto">
        <table class="table text-center border border-base-content/30">
            <thead>
                <tr class="border border-base-content/30" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('games.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.theading :label="__('games.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('date_start')">
                        <x-livewire.theading :label="__('games.table.date_start')" id="date_start" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('comments')">
                        <x-livewire.theading :label="__('games.table.comments')" id="comments" />
                    </th>
                    <th class="font-bold text-md">{{ __('games.table.users') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->games as $game)
                    <tr class="border border-base-content/30">
                        <td class="space-y-2 md:space-x-2">
                            <x-button icon="chart-bar" rounded class="bg-base-100" primary />
                            <x-button icon="information-circle" rounded class="bg-base-100" info />
                            <x-button icon="trash" rounded class="bg-base-100" negative
                                wire:click="confirm({{ $game->id }})" />
                        </td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->date_start }}</td>
                        <td>{{ $game->comments }}</td>
                        <td>
                            <div class="flex items-center justify-center -space-x-4">
                                @foreach ($game->users->take($this->playersToShow) as $user)
                                    <x-avatar md src="{{ 'https://picsum.photos/200/300?random=' . $user->id }}" />
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
                    <div class="flex items-center justify-center">
                        {{ __('games.empty') }}
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->games" :count="$this->games->count()" />
</div>
