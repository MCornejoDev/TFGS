@props([
    'title' => null,
    'action' => null,
])

<div class="self-end">
    <button {{ $attributes->merge(['class' => 'btn border-base-content/30']) }} wire:loading.attr="disabled"
        wire:click="{{ $action }}">
        <div wire:loading.remove wire:target='{{ $action }}'> {{ $title }}</div>
        <div wire:loading.flex wire:target='{{ $action }}' class="flex items-center gap-2">
            <span class="w-5 loading loading-spinner"></span>
            <span>{{ __('characters.filters.actions.loading') }}</span>
        </div>
    </button>
</div>
