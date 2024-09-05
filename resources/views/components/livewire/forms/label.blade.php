@props([
    'label' => null,
    'value' => null,
])

@if ($value)
    <div class="space-y-8 text-sm font-medium text-base-content">
        <span class="block mb-2 text-sm font-medium text-base-content">
            {{ $label }}
        </span>
        <span class="text-sm cursor-default">
            {{ $value }}
        </span>
    </div>
@else
    <span class="block text-sm font-medium text-base-content">
        {{ $label }}
    </span>
@endif
