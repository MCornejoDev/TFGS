@props([
    'id' => uniqid(),
    'label' => null,
    'model' => null,
    'alt' => null,
])

@php
    $previewImg = is_null($this->avatar)
        ? asset('storage/images/example_avatar.jpg')
        : (gettype($this->avatar) === 'object'
            ? $this->avatar->temporaryUrl()
            : asset('storage/' . $this->avatar));
@endphp

<div>
    <label for="input-{{ $id }}"
        class="block mb-2 text-sm font-medium text-base-content">{{ $label }}</label>

    <img src="{{ $previewImg }}" alt="{{ $alt }}" class="w-16 h-16 rounded-full cursor-pointer"
        @click="$refs.fileInput.click()" />

    <input type="file" wire:model="form.{{ $model }}" x-ref="fileInput" class="hidden"
        accept="image/png, image/gif, image/jpeg" />
</div>
