@props([
    'title' => null,
    'action' => null,
])

<div class="self-end">
    <button class="btn border-base-content/30" wire:loading.attr="disabled" wire:click="{{ $action }}">
        <div wire:loading.remove> {{ $title }}</div>
        <div wire:loading.flex class="flex items-center gap-2">
            <span class="w-5 loading loading-spinner"></span>
            <span>{{ __('characters.filters.actions.loading') }}</span>
        </div>
    </button>
</div>
