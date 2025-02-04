@props([
    'id' => uniqid(),
    'label' => null,
    'type' => null,
    'placeholder' => null,
    'model' => null,
    'class' => null,
    'icon' => null,
])

<div>
    <label for="input-{{ $id }}" @class([
        'text-sm font-medium text-base-content',
        'flex items-center mb-2 gap-1' => $icon,
        'block mb-2' => !$icon,
    ])>{{ $label }} @if ($icon)
            @if (Arr::has($icon, 'data-tip'))
                <span class="tooltip" data-tip="{{ $icon['data-tip'] }}">@svg($icon['value'], $icon['class'])</span>
            @else
                <span>@svg($icon['value'], $icon['class'])</span>
            @endif
        @endif
    </label>
    <input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder }}"
        class=" {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }} w-full input input-bordered placeholder:text-sm placeholder:font-bold !h-auto {{ $class }}"
        wire:model="{{ $model }}" id="input-{{ $id }}" name="input-{{ $id }}"
        @if ($type === 'number') min="1" @endif />
    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
