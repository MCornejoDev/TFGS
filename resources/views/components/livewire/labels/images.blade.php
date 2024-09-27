@props([
    'title' => null,
    'src' => null,
    'alt' => null,
    'dataTip' => null,
    'class' => null,
])

@if ($title)
    <h2>{{ $title }}</h2>
@endif

<span class="font-bold tooltip text-base-content/70" data-tip="{{ $dataTip }}">
    <img src="{{ $src }}" alt="{{ $alt }}" @merge($attributes)
        class="rounded-full w-12 h-12 {{ $class }}" />
</span>
