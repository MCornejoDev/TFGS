<div class="space-y-4">
    <div class="flex items-center justify-end gap-4">
        <x-livewire.filters.index title="{{ __('maps.filters.title') }}" :filters="$this->allFilters()"
            labelLoading="{{ __('maps.filters.actions.loading') }}" labelClear="{{ __('maps.filters.actions.clear') }}" />
        <x-button icon="user-plus" label="{{ __('maps.actions.create.btn') }}"
            class="!btn !border-base-content/30 !outline-none" wire:click='openSidePanel' />
    </div>

    <div class="space-y-4 overflow-x-auto">
        <table class="table text-center border border-base-content/30">
            <thead>
                <tr class="border border-base-content/30" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('maps.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.tables.theading :label="__('maps.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('link')">
                        <x-livewire.tables.theading :label="__('maps.table.link')" id="link" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('extension')">
                        <x-livewire.tables.theading :label="__('maps.table.extension')" id="extension" />
                    </th>
                </tr>
            </thead>
            <tbody wire:init="loadRecords">
                <x-livewire.tables.trloading wire-target="loadRecords" :label="__('maps.filters.actions.loading')" :colspan="7" />

                @forelse ($this->maps as $map)
                    <tr class="table-row border border-base-content/30" wire:loading.class="hidden"
                        wire:target="loadRecords">
                        <td class="space-y-2">
                            <x-button icon="trash" rounded class="bg-base-100" negative
                                wire:click="confirm({{ $map->id }})" />
                        </td>
                        <td class="font-bold">{{ $map->name }}</td>
                        <td class="font-bold">{{ $map->link }}</td>
                        <td class="font-bold">{{ $map->extension }}</td>
                    </tr>
                @empty
                    <tr class="font-bold border border-base-content/30" wire:loading.remove wire:target="loadRecords">
                        <td colspan="7" class="py-4 text-center">{{ __('maps.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->maps" :count="$this->maps->count()" />
</div>
