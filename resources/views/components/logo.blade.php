@props(['class' => '', 'width' => 0, 'height' => 0, 'redirectToHomePage' => false])

<div class="{{ $class }}">
    @if ($redirectToHomePage)
        <img src="{{ asset('storage/images/favicon.png') }}" width="{{ $width }}" height="{{ $height }}"
            alt="Logo" wire:click='redirectToHomePage'>
    @else
        <img src="{{ asset('storage/images/favicon.png') }}" width="{{ $width }}" height="{{ $height }}"
            alt="Logo">
    @endif
</div>
