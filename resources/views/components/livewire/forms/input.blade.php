@props([
    'id' => uniqid(),
    'label' => null,
    'type' => null,
    'placeholder' => null,
    'model' => null,
])

<div>
    <label for="input-{{ $id }}"
        class="block mb-2 text-sm font-medium text-base-content">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder }}"
        class=" {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }} w-full input input-bordered placeholder:text-sm placeholder:font-bold !h-auto"
        wire:model="{{ $model }}" id="input-{{ $id }}" name="input-{{ $id }}"
        @if ($type === 'number') min="1" @endif />
    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
