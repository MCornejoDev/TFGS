<div class="space-y-4" x-data="modals()">
    <div class="flex items-center justify-end gap-4">
        <x-livewire.filters.index title="{{ __('maps.filters.title') }}" :filters="$this->allFilters()"
            labelLoading="{{ __('maps.filters.actions.loading') }}" labelClear="{{ __('maps.filters.actions.clear') }}" />
        <x-button icon="map" label="{{ __('maps.actions.create.btn') }}"
            class="!btn !border-base-content/30 !outline-none" wire:click='openSidePanel' />
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @forelse ($this->maps as $map)
            <div class="overflow-hidden transition-transform transform shadow-lg bg-base rounded-xl hover:scale-105">
                <img src="{{ $map->picture }}" alt="{{ $map->name }}" class="object-cover w-full h-40">

                <div class="p-4">
                    <h3 class="text-lg font-semibold truncate text-base-content">
                        {{ $map->name }}
                    </h3>
                    <p class="text-sm text-gray-400 truncate">{{ $map->link }}</p>
                    <p class="mt-1 text-xs text-gray-500">{{ __('maps.table.extension') }}: {{ $map->extension }}</p>

                    <div class="flex items-center justify-between mt-4">
                        <x-button icon="arrow-up-circle" rounded wire:click="updateMap({{ $map->id }})" primary />
                        <x-button icon="eye" rounded wire:click="previewMap({{ $map->id }})" info />
                        <x-button icon="trash" rounded wire:click="confirm({{ $map->id }})" negative />
                    </div>
                </div>
            </div>
        @empty
            <div class="py-4 text-center text-gray-400 col-span-full">
                {{ __('maps.empty') }}
            </div>
        @endforelse
    </div>
    <x-livewire.pagination :items="$this->maps" :count="$this->maps->count()" />

    <x-modal name="simpleModal" class="!shadow !bg-base !text-base-content">
        <x-card title="{{ $this->map->name ?? '' }}" class="!shadow !bg-base !text-base-content">
            <img src="{{ $this->map->picture ?? '' }}" alt="{{ $this->map->name ?? '' }}" class="w-full rounded-lg" />
        </x-card>
    </x-modal>
</div>
