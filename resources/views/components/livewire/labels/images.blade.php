@props([
    'src' => null,
    'alt' => null,
    'dataTip' => null,
])

<span class="font-bold tooltip text-base-content/70" data-tip="{{ $dataTip }}">
    <img src="{{ $src }}" alt="{{ $alt }}" class="w-12 h-12 rounded-full" />
</span>
