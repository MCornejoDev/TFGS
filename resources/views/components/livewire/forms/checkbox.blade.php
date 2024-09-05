@props([
    'id' => uniqid(),
    'label' => null,
    'model' => null,
])

<div>
    <div class="form-control">
        <label class="cursor-pointer">
            <span class="label-text">{{ $label }}</span>
            <input type="checkbox"
                class=" {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }} checkbox checkbox-sm"
                wire:model="{{ $model }}" id="input-{{ $id }}" name="input-{{ $id }}" />
        </label>
    </div>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
