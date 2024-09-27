@props([
    'title' => null,
    'value' => null,
])

<div class="space-y-2">
    @if ($title)
        <h2>{{ $title }}</h2>
    @endif
    <div>
        <x-avatar lg>
            <x-slot name="label" class="!text-black !font-extrabold italic {{ strlen($value) > 3 ? '!text-xs' : '' }}">
                {{ $value }}
            </x-slot>
        </x-avatar>
    </div>
</div>
