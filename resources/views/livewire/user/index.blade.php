<div class="space-y-4">
    <div class="flex items-center justify-end gap-4">
        <x-livewire.filters.index title="{{ __('users.filters.title') }}" :filters="$this->allFilters()"
            labelLoading="{{ __('users.filters.actions.loading') }}"
            labelClear="{{ __('users.filters.actions.clear') }}" />
        <x-button icon="user-plus" label="{{ __('users.actions.create.btn') }}"
            class="!btn !border-base-content/30 !outline-none hover:bg-base/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-base"
            wire:click='openSidePanel' />
    </div>

    <div class="space-y-4 overflow-x-auto">
        <table class="table text-center shadow bg-base">
            <thead>
                <tr class="" x-data="{ 'sortDirection': $wire.entangle('sortDirection'), 'sortField': $wire.entangle('sortField') }">
                    <th class="font-bold text-md">{{ __('users.table.actions') }}</th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('name')">
                        <x-livewire.tables.theading :label="__('users.table.name')" id="name" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('email')">
                        <x-livewire.tables.theading :label="__('users.table.email')" id="email" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('timezone')">
                        <x-livewire.tables.theading :label="__('users.table.timezone')" id="timezone" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('is_admin')">
                        <x-livewire.tables.theading :label="__('users.table.is_admin')" id="is_admin" />
                    </th>
                    <th class="font-bold cursor-pointer text-md" wire:click="sortBy('avatar')">
                        <x-livewire.tables.theading :label="__('users.table.avatar')" id="avatar" />
                    </th>
                </tr>
            </thead>
            <tbody wire:init="loadRecords">
                <x-livewire.tables.trloading wire-target="loadRecords" :label="__('characters.filters.actions.loading')" :colspan="2" />

                @forelse ($this->users as $user)
                    <tr class="table-row" wire:loading.class="hidden" wire:target="loadRecords">
                        <td class="space-y-2">
                            <x-button icon="chart-bar" rounded class="bg-base-100" primary />
                            <x-button icon="information-circle" rounded class="bg-base-100" info
                                href="{{ route('user.details', ['id' => $user->id]) }}" wire:navigate />
                            <x-button icon="trash" rounded class="bg-base-100" negative
                                wire:click="confirm({{ $user->id }})" />
                        </td>
                        <td class="font-bold">
                            <div>{{ $user->name }}</div>
                        </td>
                        <td class="font-bold">
                            <div class="flex items-center justify-center gap-2 -space-x-4">
                                {{ $user->email }}
                                @if ($user->email_verified_at)
                                    <span class="tooltip" data-tip="{{ __('users.table.email_verified') }}">
                                        <x-heroicon-s-check-circle class="w-6 h-6 text-green-500" />
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="font-bold">
                            <div>{{ $user->timezone }}</div>
                        </td>
                        <td class="font-bold">
                            <div class="flex items-center justify-center -space-x-4">
                                @if ($user->is_admin)
                                    <x-heroicon-s-check-circle class="w-6 h-6 text-blue-500" />
                                @else
                                    <x-heroicon-s-x-circle class="w-6 h-6 text-red-500" />
                                @endif
                            </div>
                        </td>
                        <td>
                            <x-livewire.labels.images :dataTip="$user->avatarLabel" :src="$user->avatarImage" :alt="$user->avatarLabel"
                                class="w-auto h-auto md:w-12 md:h-12" />
                        </td>
                    </tr>
                @empty
                    <tr class="font-bold" wire:loading.remove wire:target="loadRecords">
                        <td colspan="2" class="py-4 text-center">{{ __('users.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-livewire.pagination :items="$this->users" :count="$this->users->count()" />
</div>
