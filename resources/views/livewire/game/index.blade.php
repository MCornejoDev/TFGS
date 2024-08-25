<div class="space-y-4">
    <div class="overflow-x-auto">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="font-bold text-md">{{ __('games.table.name') }}</th>
                    <th class="font-bold text-md">{{ __('games.table.date_start') }}</th>
                    <th class="font-bold text-md">{{ __('games.table.comments') }}</th>
                    <th class="font-bold text-md">{{ __('games.table.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->games as $game)
                    <tr>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->date_start }}</td>
                        <td>{{ $game->comments }}</td>
                        <td class="flex items-center justify-center gap-2">
                            <x-mini-button rounded icon="chart-bar" flat white />
                            <x-mini-button rounded icon="information-circle" flat white />
                            <x-mini-button rounded icon="trash" flat white
                                wire:click="confirm({{ $game->id }})" />
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
